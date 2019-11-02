@extends('template')
@section('content')

<div class="container-fluid container-fullw bg-white">
  <div class="row">



    <div class=" col-md-12">

      <div class="panel panel-white">
        <div class="panel-heading">
          <h2>Role</h2><br>
          <h5 class="panel-title"></h5>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-6">
              <form role="form" action="{{route('roles.store')}}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="name">Role Name</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="description">Role Description</label>
                <input type="text" class="form-control" id="description" name="description">
              </div>
            </div>
          </div>

         <button type="submit" class="btn btn-o btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection