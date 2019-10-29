@extends('template')
@section('content')

<div class="container-fluid container-fullw bg-white">
        <div class="row">



<div class="col-lg-6 col-md-12">
        <div class="panel panel-white">
            <div class="panel-heading">
                    <h2>Name</h2><br>
                <h5 class="panel-title"></h5></div>
            <div class="panel-body">
                    <table class="table">
                    
                            <tbody>
                              <tr>
                                <td><h5>Name</h5></td>
                                <td> <h5>{{$category->name}}</h5></td>
                           
                              </tr>
                              <tr>
                                <td><h5>Size Price</h5></td>
                                <td><h5>{{$category->is_size_price?'Yes':'No'}}</h5></td>
                               
                              </tr>
                              <tr>
                                  <td><h5>Product Counts</h5></td>
                                  <td><h5>{{$category->product_counts}}</h5> </td>
                                 
                                </tr>
                              
                            </tbody>
                          </table>
            
           
           

            </div>
        </div>
    </div>
        </div>
    </div>



    @endsection