@extends('template')
@section('content')
<div class="main-content">
    <div class="wrap-content container" id="container">
<div class="col-lg-5 col-sm-6">
    <div class="panel panel-transparent">
        <div class="panel-body">
            <form role="form">
                <div class="form-group">
                    <label>Input with Icon</label><span class="input-icon"><input type="text" placeholder="Text Field" id="form-field-14" class="form-control"> <i class="ti-user"></i></span></div>
                <div class="form-group">
                    <label>Right Icon</label><span class="input-icon input-icon-right"><input type="text" placeholder="Text Field" id="form-field-17" class="form-control"> <i class="ti-twitter"></i></span></div>
                <div class="form-group">
                    <label>Add-on</label>
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><small>@</small></span></div>
                        <input type="text" placeholder="Username" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <div class="input-group-append"><span class="input-group-text"><small>.00</small></span></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><small>$</small></span></div>
                        <input type="text" class="form-control">
                        <div class="input-group-append"><span class="input-group-text"><small>.00</small></span></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    </div>
  </div>
@endsection