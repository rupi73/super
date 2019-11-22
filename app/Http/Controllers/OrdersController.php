<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
use App\OrderProduct;
use App\OrderProductTreatment;
class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
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
            $franchise_id = $request->franchise_id;
            foreach($request->estimate as $estimate){
            $quantity = $estimate['quantities'][0];
            $price = $estimate['prices'][$quantity];
$orderAmount += $estimate['prices'][$quantity];
$category_id = $estimate['category']['id'];
$gst=get_field_value('App\Category','gst',['id'=>$category_id]);
$tax = calculate_tax($price,$gst);
$orderTax +=$tax;
$addOns=$estimate['addOns'];
$marginp = get_franchise_margin_category($category_id,$franchise_id);
$margin = calculate_tax($price,$marginp);
$products[]=new OrderProduct(['category_id'=>$estimate['category']['id'],'product_id'=>$estimate['product']['id'],'paper_id'=>get_field_value('App\Paper','id',['name'=>$estimate['paper']]),'size_id'=>get_field_value('App\Size','id',['value'=>$estimate['size']]),'quantity_id'=>get_field_value('App\Quantity','id',['value'=>$estimate['quantities'][0]]),'price'=>$price,'description'=>json_encode($estimate),'treatments'=>json_encode($estimate['treatments']),'tax'=>$tax,'taxp'=>$gst,'totalPrice'=>$price+$tax,'marginp'=>$marginp,'margin'=>$margin]);

            }
            
         $order =   Order::create(['franchise_id'=>$franchise_id,'client_id'=>$request->client_id,'amount'=>$orderAmount,'tax'=>$orderTax,'grossTotal'=>$orderAmount + $orderTax]);
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
         
  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
}
