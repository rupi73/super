@extends('template')
@section('content')


<div class="container" id="vapp">
              
 @foreach($roles as $role)
<div class="row">
    <div class="col-md-8">
            <div class="card my-4">
                <div class="card-body">
                
                            <h4 class="card-title">{{$role->name}}</h4>
                            <div class="row">  
                <div class="col-md-4">
                        <p class="card-text">Description</p>
                </div>
                <div class="col-md-4">
                <p class="card-text">{{$role->description}}</p>
                </div>
                @can('super',\App\Role::class)
                <div class="col-md-4">
                        <a href="{{route('roles.edit',$role->id)}}" class="card-link btn btn-success">Edit</a>
                        <a href="javascript:void(0);" class="card-link btn btn-success" @click="deleteRecord({{$role->id}})">Delete</a>
                <form action="{{route('roles.destroy',$role->id)}}" id="form-delete-{{$role->id}}" method="POST">
                @method('delete')
                @csrf
                </form>
                    </div>
              @endcan
                 
                </div>
                </div>
              </div>
            </div>
</div>
<hr>
@endforeach

{{$roles->links()}}

</div>
@endsection

@section('scripts')
@include('partials.delete')
@endsection