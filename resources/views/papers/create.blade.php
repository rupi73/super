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
    <div class="panel panel-transparent">
                                            <legend>Your Account</legend>
                                            <div class="panel-body"><br>
                                               
                                                <div class="checkbox clip-check check-primary checkbox-inline">
                                                    <input type="checkbox" id="checkbox4" value="1" checked="">
                                                    <label for="checkbox4">Prints</label>
                                                </div>
                                                <div class="checkbox clip-check check-primary checkbox-inline">
                                                    <input type="checkbox" id="checkbox5" value="1">
                                                    <label for="checkbox5">Both sides</label>
                                                </div>
                                            </div>
                                        </div>
</fieldset>


<div class="panel-heading">
<h5 class="panel-title">Quantity</h5></div>
<div class="form-group">
                                                        <div class="row">
                                                            <label class="col-sm-2 col-form-label text-right" for="inputEmail3">100</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" placeholder="price" id="inputEmail3" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="col-sm-2 col-form-label text-right" for="inputPassword3">250</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" placeholder="price" id="inputPassword32" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <label class="col-sm-2 col-form-label text-right" for="inputPassword3">500</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" placeholder="price" id="inputPassword32" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                    <div class="col-sm-6">
                                        <div class="panel panel-transparent">
                                            <div class="panel-heading">
                                                <h5 class="panel-title">Treatments</h5></div>
                                            <div class="panel-body">
                                                
                                                <div class="checkbox clip-check check-primary checkbox-inline">
                                                    <input type="checkbox" id="checkbox4" value="1" checked="">
                                                    <label for="checkbox4">Checkbox 1</label>
                                                </div>
                                                <div class="checkbox clip-check check-primary checkbox-inline">
                                                    <input type="checkbox" id="checkbox5" value="1">
                                                    <label for="checkbox5">Checkbox 2</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                        <div class="checkbox clip-check check-primary checkbox-inline">
                                                    <input type="checkbox" id="checkbox4" value="1" checked="">
                                                    <label for="checkbox6">Checkbox 1</label>
                                                </div>
                                                <div class="checkbox clip-check check-primary checkbox-inline">
                                                    <input type="checkbox" id="checkbox5" value="1">
                                                    <label for="checkbox7">Checkbox 2</label>
                                                </div>
</div>

</div>
                                        
                                       
</div>
</div>

    
  

   

</div>
</div>
</div>

  

@endsection