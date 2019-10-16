@extends('template')
@section('content')

<div class="container-fluid container-fullw bg-white">
        <div class="row">



<div class="col-lg-6 col-md-12">
        <div class="panel panel-white">
            <div class="panel-heading">
                    <h2>Category</h2><br>
                <h5 class="panel-title"></h5></div>
            <div class="panel-body">
               
            <form role="form" action="{{route('category.store')}}" method="POST">
                @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                        @if ($errors->has('name'))
    <div class="error">{{ $errors->first('name') }}</div>
@endif
                    </div>
                    <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="category_size_price" name="is_size_price">
                            <label class="form-check-label" for="category_size_price">
                              Size In Pricing
                            </label>
                          </div>
                   
                    <button type="submit" class="btn btn-o btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
        </div>
    </div>



    @endsection