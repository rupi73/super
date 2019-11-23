@extends('template')
@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-12">
                <h2 class="text-center my-5">Order Detail</h2>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
            <h5>Order :{{$order->id}}</h5>
               
            </div>

            <div class="col-md-3">
                    <h5>Client :{{$order->client['name']}}</h5>
                   
                </div>

                <div class="col-md-3">
                        <h5>Franchise :{{$order->franchise['name']}}</h5>
                       
                    </div>

                    <div class="col-md-3">
                            <h5>Date :{{$order->updated_at}}</h5>
                           
                        </div>
            
        </div><!--first row close-->


        <div class="row my-5">
                <div class="col-md-3">
                    <h5>Total Amount :{{$order->amount}}</h5>
                   
                </div>
    
                <div class="col-md-3">
                        <h5>Margin :{{$order->margin}}</h5>
                       
                    </div>
    
                    <div class="col-md-3">
                            <h5>Tax  :{{$order->tax}}</h5>
                           
                        </div>
    
                        <div class="col-md-3">
                                <h5>Payable Amount  :{{$order->amount - $order->margin}}</h5>
                               
                            </div>
                
            </div><!--second row close-->

    </div><!--card body close-->
</div><!--card close-->

            <hr>
            <h2 class="text-center my-5">Product Detail</h2>


            <table class="table">

                    <thead>
                        <tr>
                        
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Description</th>
                                <th>Cost</th>
                                <th>Margin</th>
                                <th>Tax%</th>
                                
                                         
                                      
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->products as $op)
                        <tr>
                        <td>{{$op->product->name}}</td>
                            <td>{{$op->quantity->label}}</td>
                            <td>{{$op->description}}</td>
                            <td>{{$op->price}}</td>
                            <td>{{$op->margin}}</td>
                            <td>{{$op->taxp}}</td>
                           
                        </tr>
                        @endforeach
                    </tbody>
                </table><!--table close-->


            

           
            
        </div><!--close  col-md-12-->
    </div><!--close  row-->
</div><!--close  container-->


@endsection

