@extends('template')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
        <form action="{{route('catmargins.update')}}" method="post">
               @csrf
               <div class="form-group">
                <label for="category_id">category</label>
                <select class="form-control" name="category_id">
                    <option value="">Select category</option>
                    @foreach($categories as $category)
                 
                <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach

                    
                </select>

            </div>
            <div class="form-group">
                <label for="franchise_id">Role</label>
                <select class="form-control" name="role_id">
                    <option value="">Select Role</option>
                    @foreach($roles as $role)
                   
                <option value="{{$role->id}}">{{$role->name}}</option>
                    
@endforeach
                    
                </select>

            </div>
@if(false)
            <div class="form-group">
                <label for="franchise_id">Franchisee(Optional to override Above)</label>
                <select class="form-control" name="franchise_id">
                    <option value="">Select Franchisee</option>
                    @foreach($roles as $role)
                    @foreach($role->users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
@endforeach
                    
                </select>

            </div>
@endif
            <div class="form-group">
                <label for="name">Margin(%)</label>
                <input type="text" class="form-control" name="marginp">

        </div>
        <Button type="submit" class="btn btn-primary">Save</Button>

           </form>
        </div>
    </div>
</div>

@endsection