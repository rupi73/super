@extends('template')
@section('content')


<div class="container" id="vapp">
        @foreach($gsms as $gsm)
<div class="row">
    <div class="col-md-8">
         <div class="card my-4">
                <div class="card-body">
                
                <h4 class="card-title">{{$gsm->label}}</h4>
                            <div class="row">  
                <div class="col-md-4">
                        <p class="card-text">{{$gsm->value}}</p>
                </div>

                <div class="col-md-4">
                <a href="{{route('gsm.edit',$gsm->id)}}" class="card-link btn btn-success">Edit</a>
               <a href="javascript:void(0);" class="card-link btn btn-success" @click="deleteRecord({{$gsm->id}})">Delete</a>
                <form action="{{route('gsm.destroy',$gsm->id)}}" id="form-delete-{{$gsm->id}}" method="POST">
                @method('delete')
                @csrf
                </form>
                    </div>
              
                 
                </div>
                </div>
              </div>
            </div>
</div>
<hr>
        @endforeach
{{$gsms->links()}}
</div>



@endsection

@section('scripts')
@include('partials.delete')
@endsection