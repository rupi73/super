@extends('template')
@section('content')

<div class="container-fluid container-fullw bg-white">
        <div class="row">



<div class="col-lg-6 col-md-12">
        <div class="panel panel-white">
            <div class="panel-heading">
                    <h2>{{$category->name}}</h2><br>
                <h5 class="panel-title"></h5></div>
            <div class="panel-body">
               
            Size Price:{{$category->is_size_price?'Yes':'No'}}
            </div>
        </div>
    </div>
        </div>
    </div>



    @endsection