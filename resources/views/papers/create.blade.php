@extends('template') @section('content')




<div class="container-fluid container-fullw bg-white">
    <h2>Paper Create</h2><br>
    <div class="row margin-top-30">

        <div class="col-lg-8 col-md-12">

            <form role="form" action="{{route('papers.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="paper-name">Name</label>
                    <input type="text" class="form-control" id="paper-name" placeholder="paper name" name="name">
                </div>
               
                <div class="row">
                    <h5>GSM</h5>
                    @foreach($gsms as $gsm)
                    <div class="col-sm-3">
                        <div class="panel panel-transparent">

                            <div class="panel-body">

                                <div class="checkbox clip-check check-primary">
                                    <input type="checkbox" id="check-{{$gsm->id}}" value="{{$gsm->id}}" name="gsms[]">
                                    <label for="check-{{$gsm->id}}">{{$gsm->label}}</label>
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
                                <input type="radio" id="radio-printing-none" name="settings[printing]" value="">
                                <label for="radio-printing-none">None</label>
                                <input type="radio" id="radio-printing-single" name="settings[printing]" value="single">
                                <label for="radio-printing-single">Single Side</label>
                                <input type="radio" id="radio-printing-both" name="settings[printing]" value="both">
                                <label for="radio-printing-both">Both Sides</label>

                            </div>
                        </div>
                    
                </div>
                <button type="submit" class="btn btn-outline-primary btn-lg">Save</button>
        </div>

    </div>
    <!--form-->

        

@endsection