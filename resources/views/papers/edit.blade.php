@extends('template') @section('content')
<div class="container-fluid container-fullw bg-white">
    <h2>Paper Update</h2><br>
    <div class="row margin-top-30">

        <div class="col-lg-8 col-md-12">

            <form role="form" action="{{route('papers.update',$paper->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="paper-name">Name</label>
                <input type="text" class="form-control" id="paper-name" placeholder="paper name" name="name" value="{{$paper->name}}">
                </div>
               
                <div class="row">
                    <h5>GSM</h5>
                    @foreach($gsms as $gsm)
                    <div class="col-sm-3">
                        <div class="panel panel-transparent">

                            <div class="panel-body">

                                <div class="radio clip-radio radio-primary">
                                    <input type="radio" id="radio-{{$gsm->id}}" value="{{$gsm->id}}" name="gsm_id"
                                    {{$paper->gsm_id==$gsm->id?'checked':''}}
                                    >
                                    <label for="radio-{{$gsm->id}}">{{$gsm->label}}</label>
                                </div>
                                <!--checkbox-->

                            </div>
                            <!--panel-body-->
                        </div>
                        <!-- panel-transparent-->
                    </div>
                    <!-- col-sm-3-->
                    @endforeach
                </div>
                <!--row-->
                <div class="row">
                    

                        <div class="form-group">
                            <h5>Settings</h5><br>
                            <label class="block">Printing</label>
                            <div class="clip-radio radio-primary">
                                <input type="radio" id="radio-printing-none" name="settings[printing]" value="" {{$paper->settings->printing==''?'checked':''}}>
                                <label for="radio-printing-none">None</label>
                                <input type="radio" id="radio-printing-single" name="settings[printing]" value="single" {{$paper->settings->printing=='single'?'checked':''}}>
                                <label for="radio-printing-single">Single Side</label>
                                <input type="radio" id="radio-printing-both" name="settings[printing]" value="both" {{$paper->settings->printing=='both'?'checked':''}}>
                                <label for="radio-printing-both">Both Sides</label>

                            </div>
                        </div>
                    
                </div>
                <button type="submit" class="btn btn-outline-primary btn-lg">Save</button>
        </div>

    </div>

@endsection