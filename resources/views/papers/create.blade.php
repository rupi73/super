@extends('template')
@section('content')
<div class="container-fluid container-fullw bg-white">
<h2>Paper create</h2><br>
<div class="row margin-top-30">
    
<div class="col-lg-8 col-md-12">
  

  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="email" class="form-control" id="exampleInputEmail11" placeholder="name">
    </div>

    <div class="form-group">
            <label for="exampleInputEmail1">Slug</label>
            <input type="email" class="form-control" id="exampleInputEmail11" placeholder="name">
            </div>

            <div class="row">
                    <div class="col-sm-3">
                        <div class="panel panel-transparent">
                            <div class="panel-heading">
                                <h5 class="panel-title">GSM</h5></div>
                            <div class="panel-body">
                                
                            <div class="checkbox clip-check check-primary">
                                    <input type="checkbox" id="checkbox6" value="1">
                                    <label for="checkbox6">100gsm</label>
                                </div>
                               
                            </div>
                        </div>
                    </div>




                    <div class="col-sm-3">
                        <div class="panel panel-transparent">
                            <div class="panel-heading">
                               
                            <div class="panel-body">
                           
                                <div class="checkbox clip-check check-primary mt-5">
                                    <input type="checkbox" id="checkbox7" value="1">
                                    <label for="checkbox7">250gsm</label>
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
                                    <label for="checkbox8">500gsm</label>
                                </div>
                              
                            </div>
                        </div>
                    </div>
    </div>

          

    
    <fieldset>
                                                    
                                                    <div class="form-group">
                                                        <h5>Setting</h5><br>
                                                        <label class="block">Printing</label>
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
                                    

    
                                 

                                   
                                       
</div>
<button type="button" class="btn btn-outline-primary btn-lg">Save</button> 
</div>

</div><br>

<hr>
<!--prices-->





          


<div class="container">
    <h2>Papers Prices</h2><br>

       <div class="row mt-5">
           <div class="col-md-6">
               <div class="row">
                   <div class="col-md-6">
                       
        <div class="dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                  Papers
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">matt finish</a>
                  <a class="dropdown-item" href="#">soft suede</a>
                  <a class="dropdown-item" href="#">texture</a>
                
                </div>
              </div><br>


              <div class="dropdown">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                      Category
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="#">Business card</a>
                      <a class="dropdown-item" href="#">Booklets</a>
                      <a class="dropdown-item" href="#">Coasters</a>
                     
                    </div>
                  </div>
                   </div>

                   <div class="col-md-6">
                       
                        <div class="dropdown">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                  Sizes
                                </button>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item" href="#">2mm</a>
                                  <a class="dropdown-item" href="#">4mm</a>
                                  <a class="dropdown-item" href="#">5mm</a>
                                  
                                </div>
                              </div><br>




                              <div class="dropdown">
                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                    Quantity
                                    </button>
                                    <div class="dropdown-menu">
                                      <a class="dropdown-item" href="#">100</a>
                                      <a class="dropdown-item" href="#">200</a>
                                      <a class="dropdown-item" href="#">500</a>
                                     
                                    </div>
                                  </div>
                                   </div>
               </div>
           </div>
       </div>
      </div>


   

</div>







 

  

@endsection