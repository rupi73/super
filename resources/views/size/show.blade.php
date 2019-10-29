@extends('template')
@section('content')

<div class="container-fluid container-fullw bg-white">
        <div class="row">



<div class="col-lg-6 col-md-12">
        <div class="panel panel-white">
            <div class="panel-heading">
                    <h2>Size</h2><br>
                <h5 class="panel-title"></h5></div>
            <div class="panel-body">
                    <table class="table">
                    
                            <tbody>
                              <tr>
                                <td><h5>Label</h5></td>
                                <td> <h5>{{$size->label}}</h5></td>
                           
                              </tr>
                              <tr>
                                <td><h5>Value</h5></td>
                                <td><h5>{{$size->value}}</h5></td>
                               
                              </tr>
                             
                              
                            </tbody>
                          </table>
            
           
           

            </div>
        </div>
    </div>
        </div>
    </div>



    @endsection