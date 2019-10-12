@extends('template')
@section('content')


<div class="container">
        @foreach($sizes as $size)
<div class="row">
    <div class="col-md-8">
        
        <div class="card my-4">
                <div class="card-body">
                
                            <h4 class="card-title">{{$size->label}}</h4>
                            <div class="row">  
                <div class="col-md-4">
                        <p class="card-text">{{$size->value}}</p>
                </div>
                <div class="col-md-4">
                        <p class="card-text">{{$size->category->name}}</p>
                </div>
                <div class="col-md-4">
                <a href="{{route('quantity.edit',$size->id)}}" class="card-link">Edit</a>
                <a href="{{route('quantity.destroy',$size->id)}}" class="card-link">Delete</a>
                    </div>
              
                 
                </div>
                </div>
              </div>
            </div>
</div>
<hr>
@endforeach
{{$sizes->links()}}

@endsection