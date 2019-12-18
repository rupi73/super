<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
use App\OrderProduct;
use App\OrderProductTreatment;
use App\OrderPayment;
class OrdersController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(\Gate::allows('super',\App\Category::class))
        $orders=Order::with(['products'])->latest()->paginate(10);
        else
        $orders=Order::with(['products'])->where('franchise_id',auth()->id())->latest()->paginate(10);
        $_orders=[];
        foreach($orders as $order){
            $_orders[]=['date'=>$order->updated_at->format('d-m-Y'),'franchise'=>$order->franchise->name,'client'=>$order->client->name,'amount'=>$order->amount,'margin'=>$order->products->sum('margin'),'products'=>order_product_names($order->products),
            'status'=>$order->status,'paid'=>$order->paid,
            'id'=>$order->id];
        }
        $_orders=json_encode($_orders);
        return view('orders.index',compact('_orders','orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function quoteStore(Request $request)
    {
        //
           $data = $this->validate($request,[
            'franchise_id'=>'required|numeric',
            'client_id'=>'required|numeric',
            'estimate'=>'required'
                    ]);
            $products=[];
            $orderAmount = 0;
            $orderTax = 0;
            $orderMargin = 0;
            $franchise_id = $request->franchise_id;
            foreach($request->estimate as $estimate){
            $quantity = is_array($estimate['quantities'])?$estimate['quantities'][0]:$estimate['quantities'];
            $price = $estimate['prices'][$quantity];
$orderAmount += $estimate['prices'][$quantity];
$category_id = $estimate['category']['id'];
$gst=get_field_value('App\Category','gst',['id'=>$category_id]);
$addOns=$estimate['addOns'];
$marginp = get_franchise_margin_category($category_id,$franchise_id);
$margin = calculate_tax($price,$marginp);
$orderMargin +=$margin;
$tax = calculate_tax(($price-$margin),$gst);
$orderTax +=$tax;
$products[]=new OrderProduct(['category_id'=>$estimate['category']['id'],'product_id'=>$estimate['product']['id'],'paper_id'=>get_field_value('App\Paper','id',['name'=>$estimate['paper']]),'size_id'=>get_field_value('App\Size','id',['value'=>$estimate['size']]),'quantity_id'=>get_field_value('App\Quantity','id',['value'=>$quantity]),'price'=>$price,'description'=>json_encode($estimate),'treatments'=>json_encode($estimate['treatments']),'tax'=>$tax,'taxp'=>$gst,'totalPrice'=>$price+$tax,'marginp'=>$marginp,'margin'=>$margin]);

            }
            
            $orderData = ['franchise_id'=>$franchise_id,'client_id'=>$request->client_id,'amount'=>$orderAmount,'tax'=>$orderTax,
            'margin'=>$orderMargin,
            'grossTotal'=>$orderAmount,'billedAmount'=>($orderAmount-$orderMargin)+$orderTax];
        if(!$request->id)
         $order =   Order::create($orderData);
        else{
            $order = Order::findOrFail($request->id);
            $order->update($orderData);
            foreach($order->products as $upop){
            $upop->treatments()->detach();
            $upop->addOns()->detach();
            }
            $order->products()->delete(); 
        }
        foreach($products as $product){
            $order->products()->save($product);
            if($product->treatments){
                $treatments = [];
                $product->treatments =json_decode($product->treatments,true);
                foreach($product->treatments as $treat=>$description){
                    $treat = str_replace('_',' ',$treat);
                   $id = get_field_value_raw('App\Treatment','id',"LOWER(name)='$treat'");
                  $treatments[$id]=['description'=>json_encode($description)];
                   
                }
                $product->treatments()->attach($treatments);
            }
            
            if($addOns){
                $addOnes=[];
                foreach($addOns as $addOn){
                  $addOnes[$addOn['id']] =['order_id'=>$order->id,'price'=>$addOn['price']];         
                }
                
               $product->addOns()->attach($addOnes);  
            }

        }
        print json_encode(['success'=>true]);
  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
        abort_if(!is_owner_of($order,'franchise_id') && \Gate::denies('admin',\App\Category::class),403);
        return view('orders.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function payOrder(){
        $order = Order::findOrFail(request('order_id'));
        abort_if(!is_owner_of($order,'franchise_id') && \Gate::denies('admin',\App\Category::class),403);
        $paid = OrderPayment::where('order_id', $order->id)->sum('paidAmount');        
        $toPay = $order->billedAmount-$paid;
         if($order->franchise->balance >= $toPay && $toPay > 0){
            $t = $order->franchise->withdraw($toPay);
            $billing = ['order_id'=>$order->id,'paidAmount'=>$toPay,'payment_method'=>'wallet','transaction_details'=>$t->id];
            $bo=OrderPayment::create($billing);
            if(($paid + $toPay)>=$order->billedAmount){               
            $order->update(['status'=>'pending','paid'=>1]);

            }
            }
       
       return back();
        
    }
}
