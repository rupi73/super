@extends('template')
@section('content')


<div class="container" id="vapp">
              
 @foreach($users as $user)
<div class="row">
    <div class="col-md-8">
            <div class="card my-4">
                <div class="card-body">
                
                            <h4 class="card-title">{{$user->name}}</h4>
                            <div class="row">  
                <div class="col-md-2">
                        <p class="card-text">Roles</p>
                </div>
                <div class="col-md-6">
                <p class="card-text"><ul class="list-inline">
                  @foreach($user->roles as $role)
                <li class="list-inline-item">{{$role->name}}</li>
                    @endforeach

                  </ul></p>
                </div>
                @can('super',\App\User::class)
                <div class="col-md-4">
                        <a href="{{route('users.edit',$user->id)}}" class="card-link btn btn-success">Edit</a>
                        <a href="javascript:void(0);" class="card-link btn btn-success" @click="deleteRecord({{$user->id}})">Delete</a>
                <form action="{{route('users.destroy',$user->id)}}" id="form-delete-{{$user->id}}" method="POST">
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

{{$users->links()}}

</div>
@endsection

@section('scripts')
@include('partials.delete')
@endsection