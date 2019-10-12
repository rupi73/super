@extends('template')
@section('content')

<div class="container-fluid container-fullw bg-white">
        <div class="row">



<div class="col-lg-8 col-md-12">
        <div class="panel panel-white">
            <div class="panel-heading">
             <h2>GSM</h2>
            <div class="panel-body">
               
            <form role="form" action="{{route('gsm.store')}}" method="post">
                {{csrf_field()}}
                    <div class="form-group">
                        <label for="label">Label</label>
                        <input type="text" class="form-control" id="label" name="label">
                        @if($errors->has('label'))
                    <div class="error">{{$errors->first('label')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                            <label for="value">Value</label>
                            <input type="text" class="form-control" id="value" name="value">
                            @if($errors->has('value'))
<div class="error">{{$errors->first('value')}}</div>
                            @endif
                        </div>
                    <button type="submit" class="btn btn-o btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
        </div>
    </div>



    @endsection