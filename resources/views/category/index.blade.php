@extends('template')
@section('content')


<div class="container">
              
 @foreach($categories as $category)
<div class="row">
    <div class="col-md-8">
            <div class="card my-4">
                <div class="card-body">
                
                            <h4 class="card-title">{{$category->name}}</h4>
                            <div class="row">  
                <div class="col-md-4">
                        <p class="card-text">Products</p>
                </div>
                <div class="col-md-4">
                <p class="card-text">{{$category->product_counts}}</p>
                </div>
                <div class="col-md-4">
                        <a href="{{route('category.edit',$category->id)}}" class="card-link btn btn-success">Edit</a>
                    </div>
              
                 
                </div>
                </div>
              </div>
            </div>
</div>
<hr>
@endforeach

{{$categories->links()}}

</div>
@endsection