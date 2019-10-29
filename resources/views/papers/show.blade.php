@extends('template')
@section('content')

<div class="container-fluid container-fullw bg-white">
        <div class="row">



<div class="col-lg-8 col-md-12">
        <div class="panel panel-white">
            <div class="panel-heading">
             <h2>Paper show</h2>
            <div class="panel-body">
                <table class="table">
                    
                    <tbody>
                      <tr>
                        <td><h5>Name</h5></td>
                        <td><h5> {{$paper->name}}</h5></td>
                   
                      </tr>
                      <tr>
                        <td><h5>Slug</h5></td>
                        <td><h5>{{$paper->slug}}</h5> </td>
                       
                      </tr>
                      <tr>
                          <td><h5>Settings</h5></td>
                          <td><h5>{{$paper->settings}}</h5> </td>
                         
                        </tr>
                      
                    </tbody>
                  </table>
           
            </div>
        </div>
    </div>
        </div>
    </div>



    @endsection