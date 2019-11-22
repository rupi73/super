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
                <h5>Order :</h5>
               
            </div>

            <div class="col-md-3">
                    <h5>Client :</h5>
                   
                </div>

                <div class="col-md-3">
                        <h5>Franchise :</h5>
                       
                    </div>

                    <div class="col-md-3">
                            <h5>Date :</h5>
                           
                        </div>
            
        </div><!--first row close-->


        <div class="row my-5">
                <div class="col-md-3">
                    <h5>Total Amount :</h5>
                   
                </div>
    
                <div class="col-md-3">
                        <h5>Margin :</h5>
                       
                    </div>
    
                    <div class="col-md-3">
                            <h5>Tax  :</h5>
                           
                        </div>
    
                        <div class="col-md-3">
                                <h5>Payable Amount  :</h5>
                               
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
                                         
                                      
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                           
                        </tr>
                    </tbody>
                </table><!--table close-->


            

           
            
        </div><!--close  col-md-12-->
    </div><!--close  row-->
</div><!--close  container-->


@endsection

