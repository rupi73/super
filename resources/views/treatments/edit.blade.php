@extends('template')
@section('content')
<div class="container-fluid container-fullw bg-white">
  <div class="row">

<div class=" col-md-12">
  
  <div class="panel panel-white">
      <div class="panel-heading">
              <h2>Treatment</h2><br>
          <h5 class="panel-title"></h5>
        </div><!--panel heading-->
      <div class="panel-body">
              <div class="row">
                      <div class="col-md-12">
                      <form role="form" action="{{route('treatments.update',$treatment->id)}}" method="POST">
                          @csrf
                          @method('PATCH')
              <div class="form-group">
                  <label for="label">Name</label>
              <input type="text" class="form-control" id="label" name="name" value="{{$treatment->name}}">
              </div><!--form-group-->
          </div><!--col-md-12-->
          

          </div><!--row-->
          <h5 class="panel-title">Settings</h5>
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="label">Colors</label>
                <input type="text" class="form-control" id="label" name="colors" value="{{$treatment->settings->colors}}">
                <small>input colors separating by commas or leave blank if there are no colors</small>
            </div><!--form-group-->
            </div><!--col-md-3-->
            <div class="col-md-3">
              <div class="form-check">
                <input class="form-check-input" type="radio" value="single" id="printing_single" name="sides" {{$treatment->settings->sides=='single'?'checked':''}}>
                <label class="form-check-label" for="printing_single">
                  Single Side
                </label>
              </div><!--form-check-->
            </div><!--col-md-3-->
            <div class="col-md-3">
              <div class="form-check">
                <input class="form-check-input" type="radio" value="both" id="printing_both" name="sides" {{$treatment->settings->sides=='both'?'checked':''}}>
                <label class="form-check-label" for="printing_both">
                  Both Sides
                </label>
              </div><!--form-check-->
            </div><!--col-md-3-->
          </div><!--row-->
            <button type="submit" class="btn btn-o btn-primary">Submit</button>
          </form>
      </div>
  </div>
</div>
  </div>
</div>

@endsection