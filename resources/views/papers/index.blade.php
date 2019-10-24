@extends('template')
@section('content')
<div class="container" id="vapp">
    
    <div class="row">
        <h2>Paper Index</h2>
        @foreach($papers as $paper)
       
        <div class="col-md-12 mt-5">
        <div class="card" >
  <div class="card-body">
  <h4 class="card-title">{{$paper->name}}</h4>
    
<p><b>GSM :</b>	
{{$paper->gsm->label}}

</p>
<p><b>Settings :</b>{{$paper->settings}}
</p>
<a href="{{route('papers.edit',$paper->id)}}" class="card-link btn btn-success">Edit</a>
<a href="javascript:void(0);" class="card-link btn btn-success" @click="deleteRecord({{$paper->id}})">Delete</a>
<form action="{{route('papers.destroy',$paper->id)}}" id="form-delete-{{$paper->id}}" method="POST">
        @method('delete')
        @csrf
        </form>
  </div>
</div>

        </div>
  
@endforeach
{{$papers->links()}}
      </div>
    </div>


 
    @section('scripts')
    @include('partials.delete')
    @endsection














</div>

@endsection