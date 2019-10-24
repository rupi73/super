@extends('template')
@section('content')

<div class="container-fluid container-fullw bg-white">
        <div class="row">



<div class=" col-md-12">
        
        <div class="panel panel-white">
            <div class="panel-heading">
                    <h2>Size</h2><br>
                <h5 class="panel-title"></h5></div>
            <div class="panel-body">
                    <div class="row">
                            <div class="col-md-6">
                            <form role="form" action="{{route('sizes.update',$size->id)}}" method="POST">
                                @csrf
                                @method('PATCH')
                    <div class="form-group">
                        <label for="label">Label</label>
                    <input type="text" class="form-control" id="label" name="label" value="{{$size->label}}">
                    </div>
                </div>
                
                        <div class="col-md-6">
                    <div class="form-group">
                            <label for="value">Value</label>
                            <input type="text" class="form-control" id="value" name="value" value="{{$size->value}}">
                        </div>
                        </div>
                </div>
                <h5 class="panel-title">Categories</h5>

                    <div class="row">
                        
                      @foreach($categories as $category)  
                   <div class="col-md-3">            
                
                            <div class="panel-body">
                                <div class="checkbox clip-check check-primary">
                                <input type="checkbox" id="check-{{$category->name}}" value="{{$category->id}}" name="categories[]" {{in_array($category->id,$current_categories)?'checked':''}}>
                                <label for="check-{{$category->name}}">{{$category->name}}</label>
                                </div><!--check -->
                            </div><!--panel body-->
                        </div><!--col-md-3-->
                        @endforeach
                            
                    </div><!--row-->

                   
                    <button type="submit" class="btn btn-o btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
        </div>
    </div>



    @endsection