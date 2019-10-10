@extends('template')
@section('content')
<div class="container-fluid container-fullw bg-white">
<h2>Paper create</h2><br>
<div class="row margin-top-30">
    
<div class="col-lg-6 col-md-12">
  

  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="email" class="form-control" id="exampleInputEmail11" placeholder="name">
    </div>

    
    <fieldset>
        
                                                    <div class="form-group">
                                                        <label class="block">Print</label>
                                                        <div class="clip-radio radio-primary">
                                                        <input type="radio" id="male" name="gender" value="male" checked="checked">
                                                            <label for="male">None</label>
                                                            <input type="radio" id="female" name="gender" value="female">
                                                            <label for="female">Single side</label>
                                                            <input type="radio" id="male" name="gender" value="male" checked="">
                                                            <label for="male">Both side</label>
                                                           
                                                        </div>
                                                    </div>
</fieldset>
                                    <div class="col-md-6">
                                        
                                            <legend>Quantity</legend>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>100</label>
                                                        <input type="text" name="firstName" class="form-control" placeholder="price" >
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">250</label>
                                                        <input type="text" name="lastName" class="form-control" placeholder="price" >
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">500</label>
                                                        <input type="text" name="lastName" class="form-control" placeholder="price" >
                                                    </div>
                                                </div>
                                            </div>
</div>
                            
                                     <div class="row">
                                    <div class="col-sm-3">
                                        <div class="panel panel-transparent">
                                            <div class="panel-heading">
                                                <h5 class="panel-title">Treatments</h5></div>
                                            <div class="panel-body">
                                                
                                            <div class="checkbox clip-check check-primary">
                                                    <input type="checkbox" id="checkbox6" value="1">
                                                    <label for="checkbox6">Edgepaint</label>
                                                </div>
                                                <div class="checkbox clip-check check-primary">
                                                    <input type="checkbox" id="checkbox7" value="1">
                                                    <label for="checkbox7">Electroplating</label>
                                                </div>
                                                <div class="checkbox clip-check check-primary">
                                                    <input type="checkbox" id="checkbox7" value="1">
                                                    <label for="checkbox7">Raised Spot Gloss</label>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>




                                    <div class="col-sm-3">
                                        <div class="panel panel-transparent">
                                            <div class="panel-heading">
                                               
                                            <div class="panel-body">
                                           
                                                <div class="checkbox clip-check check-primary mt-5">
                                                    <input type="checkbox" id="checkbox8" value="1">
                                                    <label for="checkbox8">Laser Cutting</label>
                                                </div>
                                                <div class="checkbox clip-check check-primary">
                                                    <input type="checkbox" id="checkbox9" value="1" >
                                                    <label for="checkbox9">Laser Engrave</label>
                                                </div>
                                                <div class="checkbox clip-check check-primary">
                                                    <input type="checkbox" id="checkbox7" value="1">
                                                    <label for="checkbox7">Roundcorner</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>









</div>

                                <div class="col-sm-3 ml-2">
                                        <div class="panel panel-transparent">
                                            <div class="panel-heading">
                                               
                                            <div class="panel-body">
                                                
                                            <div class="checkbox clip-check check-primary mt-5">
                                                    <input type="checkbox" id="checkbox8" value="1">
                                                    <label for="checkbox8">Foiling</label>
                                                </div>
                                                <div class="checkbox clip-check check-primary">
                                                    <input type="checkbox" id="checkbox9" value="1" >
                                                    <label for="checkbox9">Letterpress</label>
                                                </div>
                                             
                                            </div>
                                        </div>
                                    </div>
                    </div>

    
                                 

                                   
                                       
</div>
<button type="button" class="btn btn-outline-primary btn-lg">Save</button> 
</div>

</div>

    
  

   

</div>
</div>
</div>

  

@endsection