@extends('template')
@section('content')


<div class="container">
        @foreach($quantities as $quantity)
<div class="row">
    <div class="col-md-8">
        
        <div class="card my-4">
                <div class="card-body">
                
                            <h4 class="card-title">{{$quantity->label}}</h4>
                            <div class="row">  
                <div class="col-md-4">
                        <p class="card-text">{{$quantity->value}}</p>
                </div>
                <div class="col-md-4">
                        <p class="card-text">{{$quantity->category->name}}</p>
                </div>
                <div class="col-md-4">
                <a href="{{route('quantity.edit',$quantity->id)}}" class="card-link">Edit</a>
                <a href="{{route('quantity.destroy',$quantity->id)}}" class="card-link">Delete</a>
                    </div>
              
                 
                </div>
                </div>
              </div>
            </div>
</div>
<hr>
@endforeach
{{$quantities->links()}}

@endsection