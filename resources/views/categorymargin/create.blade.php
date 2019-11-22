@extends('template')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
           <form action="" method="post">
               @csrf
            <div class="form-group">
                <label for="franchise_id">Franchisee</label>
                <select class="form-control" name="franchise_id">
                    <option value="">Select Franchisee</option>
                    @foreach($franchises as $franchise)
                    @foreach($franchise->users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
@endforeach
                    
                </select>

            </div>

            <div class="form-group">
                <label for="category_id">category</label>
                <select class="form-control" name="category_id">
                    <option value="">Select category</option>
                    @foreach($categories as $category)
                 
                <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach

                    
                </select>

            </div>
          

           </form>
        </div>
    </div>
</div>

@endsection