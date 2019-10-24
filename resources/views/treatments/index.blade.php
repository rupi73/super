@extends('template')
@section('content')
<div class="container" id="vapp">
    
  <div class="row">
      <h2>Treatments Index</h2>
      @foreach($treatments as $treatment)
     
      <div class="col-md-12 mt-5">
      <div class="card" >
<div class="card-body">
<h4 class="card-title">{{$treatment->name}}</h4>
<p><b>Printing :</b>	
{!!json_decode($treatment->settings)->sides!!}
  
  </p>
  
    

@isset(json_decode($treatment->settings)->colors)
<p><b>Colors :</b>
{!! json_decode($treatment->settings)->colors !!}
</p>
@endisset


   
      
  

<a href="{{route('treatments.edit',$treatment->id)}}" class="card-link btn btn-success">Edit</a>
<a href="javascript:void(0);" class="card-link btn btn-success" @click="deleteRecord({{$treatment->id}})">Delete</a>
<form action="{{route('treatments.destroy',$treatment->id)}}" id="form-delete-{{$treatment->id}}" method="POST">
        @method('delete')
        @csrf
        </form>
  
</div>
</div>

      </div>

@endforeach
{{$treatments->links()}}
    </div>
  </div>
</div>
@endsection

@section('scripts')
@include('partials.delete')
@endsection