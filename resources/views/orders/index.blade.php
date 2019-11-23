@extends('template')
@section('content')

<div class="container">

    <div class="row">

        <div class="col-md-12">

            <h2 class="display-4">Order Details</h2>
            <table class="table">

                <thead>
                    <tr>

         
                        <th>Date</th>
                        <th>Franchise</th>
                        <th>Client</th>
                        <th>Order Amount</th>
                        <th>Margin</th>
                        <th>Products</th>
                        <th>Action</th>
                    </tr>
                </thead>
                    <tbody>
                    @foreach($orders as $order)       
                        <tr>
                        <td>{{$order->updated_at}}</td>
                     <td>{{$order->updated_at}}</td>
                     <td>{{$order->franchise_id}}</td>
                     <td>{{$order->amount}}</td>
                     <td>{{$order->products->sum('margin')}}</td>
                     <td>@foreach($order->products as $op)
                     <span>{{$op->product->name}}</span>
                    @endforeach
                    </td>
                     
                       
                            <td>

                                    <form action="" method="POST">
                            
                                
                                    <a class="btn btn-primary" href="{{route('orders.show',$order->id)}}" >Show</a> 
                
                                    <a class="btn btn-primary" href="{{route('orders.qedit',[1,$order->id])}}" >Edit</a> 
                
                                        </form>
                            </td>
                       
                        </tr>
                        @endforeach
                    </tbody>
                </table><!--end table-->
        </div><!--end colom-->
    </div><!--end row-->
</div><!--end container-->









@endsection