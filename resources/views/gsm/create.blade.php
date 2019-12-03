@extends('template')
@section('content')
<style>


.card{
    margin-bottom:20px;
    box-shadow: 0 6px 6px 0 rgba(0, 0, 0, 0.2), 0 4px 4px 0 rgba(0, 0, 0, 0);
   
}







    </style>


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
</div>


<!--form estimate-->

<div class="container bg-white">
    <div class="row">
        <div class="col-md-5">
    <h1 class="display-5 my-3 "><b>Estimate</b></h1>

    <div class="row">

            <div class="col-md-6">
                    <div class="form-group">
                        <label for="franchise"> </label>
                        <select class="custom-select custom-select-lg">
                            <option value="selected">Select Category</option>
                            <option> Mohinder</option>
                            <option> Mohinder</option>
                        </select>
                    
                    </div>
                            </div>
                            <div class="col-md-6">
                    
                    <div class="form-group" >
                            <label for="franchise"></label>
                            <select class="custom-select custom-select-lg">
                                <option value="">Select Products</option>
                                <option> Mohinder</option>
                                <option> Mohinder</option>
                            </select>
                        
                        </div>
                            </div>
    </div><!--estimate row close-->
<hr>


  
    <div id="accordion" >

      <h1 class="display-5 my-4"><b>Calculator</b></h1>



      <div class="card " >
        <div class="card-header bg-white">
          <a class="collapsed card-link" data-toggle="collapse" href="#paper">
                <h6 class=" d-inline text-dark  "><b>Select Papers</b></h6>
                <span class="badge badge-primary  d-inline float-right">Matt-finish </span> 
               
          </a>
        </div>
        <div id="paper" class="collapse" data-parent="#accordion">
          <div class="card-body">
                <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="optradio"><p>soft suede paper 350gsm</p>
                        </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="optradio"><p> soft suede paper 500gsm</p>
                        </label>
                      </div>
          </div>
        </div>
      </div><!--paper close-->

      <div class="card "  >
        <div class="card-header bg-white">
          <a class="collapsed card-link" data-toggle="collapse" href="#size">
                <h6 class="text-dark d-inline"><b>Select size</b></h6>
                <span class="badge badge-primary  d-inline float-right">3mm-5mm </span>
          </a>
        </div>
        <div id="size" class="collapse" data-parent="#accordion">
          <div class="card-body ">
              <table class="table">
                  <tbody>
                      <tr>
                          <td>
                <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="optradio"><p> 3.5 * 4.5<p>
                        </label>
                      </div>
                          </td>
                      </tr>
                          <tr>
                              <td>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="optradio"><p>3.2 * 5.5</p>
                        </label>
                      </div>
                              </td>
                          </tr>
                        </tbody>
              </table>
                
           
          </div>
        </div>
      </div><!--size close-->

      <div class="card ">
            <div class="card-header bg-white">
              <a class="collapsed card-link" data-toggle="collapse" href="#printing">
                    <h6 class="text-dark d-inline"><b>Select Printing</b></h6>
                    <span class="badge badge-primary  d-inline float-right">single side</span>
              </a>
            </div>
            <div id="printing" class="collapse" data-parent="#accordion">
              <div class="card-body">
                  <table>
                      <tbody>
                          <tr>
                              <td>
                        <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="optradio"><p>Single side</p>
                            </label>
                          </div>
                              </td>
                          </tr>

                          <tr>
                              <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="optradio"> <p>Both side</p>
                            </label>
                          </div>
                              </td>
                          </tr>
                      </tbody>
                  </table>
              </div>
            </div>
          
          </div><!--printing close-->

          <hr>




              <h1 class="display-5 my-5 "><b>Treatments</b></h1>
            <!--Raisespotgloss-->

            
              <div class="card">
                    <div class="card-header bg-white">
                      <a class="collapsed card-link" data-toggle="collapse" href="#raisespotgloss">
                            <h6 class="text-dark d-inline"><b>Raisespotgloss</b></h6>  
                           
                            <span class="badge badge-primary  d-inline float-right">single side</span> 
                      </a>
                    </div>
                    <div id="raisespotgloss" class="collapse" data-parent="#accordion">
                      <div class="card-body">
                            <div class="form-check-inline">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input " name="optradio"><p>None</p> 
                                    </label>
                                  </div>
                                  <div class="form-check-inline">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="optradio"><p>Single side</p>
                                    </label>
                                  </div>
                                  <div class="form-check-inline">
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio"><p>Both side</p>
                                            </label>
                                      </div>
                        
                      </div>
                    </div>
                  </div>

                <!--Roundcorners-->
                  <div class="card">
                        <div class="card-header bg-white">
                          <a class="collapsed card-link" data-toggle="collapse" href="#roundcorners">
                                <h6 class="text-dark d-inline"><b>Roundcorners</b></h6>
                                <span class="badge badge-primary  d-inline float-right">single side </span>
                          </a>
                        </div>
                        <div id="roundcorners" class="collapse" data-parent="#accordion">
                          <div class="card-body">
                                <div class="form-check-inline">
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio"><p>None</p> 
                                        </label>
                                      </div>
                                      <div class="form-check-inline">
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio"><p>Single side</p>
                                        </label>
                                      </div>
                            
                          </div>
                        </div>
                      </div>

        <!--foiling-->              
                      <div class="card">
                            <div class="card-header bg-white">
                              <a class="collapsed card-link" data-toggle="collapse" href="#foiling">
                                    <h6 class="text-dark d-inline"><b>Foiling</b></h6>
                                    <span class="badge badge-primary  d-inline float-right mx-1 ">front - cooper </span>
                                    <span class="badge badge-primary  d-inline float-right ">Back -cooper </span>

                              </a>
                            </div>
                            <div id="foiling" class="collapse" data-parent="#accordion">

                              <div class="card-body">
                                    <p class="ml-2">Front side  </p>
                                  <div class="row ml-2">

                                        
                                    <div class="form-check-inline ">
                                            <label class="form-check-label">
                                              <input type="radio" class="form-check-input" name="optradio"><p>None</p> 
                                            </label>
                                          </div>
                                          <div class="form-check-inline">
                                            <label class="form-check-label">
                                              <input type="radio" class="form-check-input" name="optradio"><p>Cooper</p>
                                            </label>
                                          </div>

                                          <div class="form-check-inline">
                                                <label class="form-check-label">
                                                  <input type="radio" class="form-check-input" name="optradio"><p>Gold</p>
                                                </label>
                                              </div>

                                              <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                      <input type="radio" class="form-check-input" name="optradio"><p>Silver</p>
                                                    </label>
                                                  </div>
                                                </div>
                                
                                                    <hr>
                                                <p class="ml-2 my-3">Back side</p>
                                                <div class="row ml-2">
                                                        
                                                      <div class="form-check-inline">
                                                              <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="optradio"><p>None</p> 
                                                              </label>
                                                            </div>
                                                            <div class="form-check-inline">
                                                              <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="optradio"><p>Cooper</p>
                                                              </label>
                                                            </div>
                  
                                                            <div class="form-check-inline">
                                                                  <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="optradio"><p>Gold</p>
                                                                  </label>
                                                                </div>
                  
                                                                <div class="form-check-inline">
                                                                      <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="optradio"><p>Silver</p>
                                                                      </label>
                                                                    </div>
                                                                  </div>
                              </div>
                            </div>
                          </div>



                            <!--electroplating-->
                          <div class="card">
                                <div class="card-header bg-white">
                                  <a class="collapsed card-link" data-toggle="collapse" href="#electroplating">
                                        <h6 class="text-dark d-inline"><b>Electroplating</b></h6>
                                        <span class="badge badge-primary  d-inline float-right mx-1 ">front-cooper </span>
                                        <span class="badge badge-primary  d-inline float-right ">Back-cooper </span>
                                  </a>
                                </div>
                                <div id="electroplating" class="collapse" data-parent="#accordion">
    
                                  <div class="card-body">
                                        <p class="ml-2">Front side  </p>
                                      <div class="row ml-2">
    
                                            
                                        <div class="form-check-inline ">
                                                <label class="form-check-label">
                                                  <input type="radio" class="form-check-input" name="optradio"><p>None</p> 
                                                </label>
                                              </div>
                                              <div class="form-check-inline">
                                                <label class="form-check-label">
                                                  <input type="radio" class="form-check-input" name="optradio"><p>Cooper</p>
                                                </label>
                                              </div>
    
                                              <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                      <input type="radio" class="form-check-input" name="optradio"> <p>Rose Gold</p>
                                                    </label>
                                                  </div>
    
                                                  <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                          <input type="radio" class="form-check-input" name="optradio"><p>Silver</p>
                                                        </label>
                                                      </div>
                                                    </div>
                                    <hr>
    
                                                    <p class="ml-2 my-3">Back side</p>
                                                    <div class="row ml-2">
                                                            
                                                          <div class="form-check-inline">
                                                                  <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="optradio"><p>None</p> 
                                                                  </label>
                                                                </div>
                                                                <div class="form-check-inline">
                                                                  <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="optradio"><p>Cooper</p>
                                                                  </label>
                                                                </div>
                      
                                                                <div class="form-check-inline">
                                                                      <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="optradio"><p>Rose Gold</p>
                                                                      </label>
                                                                    </div>
                      
                                                                    <div class="form-check-inline">
                                                                          <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input" name="optradio"><p>Silver</p>
                                                                          </label>
                                                                        </div>
                                                                      </div>
                                  </div>
                                </div>
                              </div>




                              <!--letterpress-->


                              <div class="card">
                                    <div class="card-header bg-white">
                                      <a class="collapsed card-link" data-toggle="collapse" href="#letterpress">
                                            <h6 class="text-dark d-inline"><b>Letterpress</b></h6>
                                            <span class="badge badge-primary  d-inline float-right mx-1">front-cooper </span>
                                            <span class="badge badge-primary  d-inline float-right ">Back-cooper </span>         
                                      </a>
                                    </div>
                                    <div id="letterpress" class="collapse" data-parent="#accordion">
        
                                      <div class="card-body">
                                            <p class="ml-2">Front side  </p>
                                          <div class="row ml-2">
        
                                                
                                            <div class="form-check-inline ">
                                                    <label class="form-check-label">
                                                      <input type="radio" class="form-check-input" name="optradio"><p>None</p> 
                                                    </label>
                                                  </div>
                                                  <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                      <input type="radio" class="form-check-input" name="optradio"><p>Black</p>
                                                    </label>
                                                  </div>
        
                                                  <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                          <input type="radio" class="form-check-input" name="optradio"><p>Blue</p>
                                                        </label>
                                                      </div>
        
                                                      <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                              <input type="radio" class="form-check-input" name="optradio"><p>Orange</p>
                                                            </label>
                                                          </div>
                                                        </div>
                                        <hr>
        
                                                        <p class="ml-2 my-3">Back side</p>
                                                        <div class="row ml-2">
                                                                
                                                              <div class="form-check-inline">
                                                                      <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="optradio"><p>None</p> 
                                                                      </label>
                                                                    </div>
                                                                    <div class="form-check-inline">
                                                                      <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="optradio"><p>Black</p>
                                                                      </label>
                                                                    </div>
                          
                                                                    <div class="form-check-inline">
                                                                          <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input" name="optradio"><p>Blue</p> 
                                                                          </label>
                                                                        </div>
                          
                                                                        <div class="form-check-inline">
                                                                              <label class="form-check-label">
                                                                                <input type="radio" class="form-check-input" name="optradio"><p>Orange</p>
                                                                              </label>
                                                                            </div>
                                                                          </div>
                                      </div>
                                    </div>
                                  </div>



                                  <!--edgepaint-->

                                  <div class="card">
                                        <div class="card-header bg-white">
                                          <a class="collapsed card-link" data-toggle="collapse" href="#edgepaint">
                                                <h6 class="text-dark d-inline"><b>Edgepaint</b></h6> 
                                                <span class="badge badge-primary  d-inline float-right">cooper </span>
                                             
                                          </a>
                                        </div>
                                        <div id="edgepaint" class="collapse" data-parent="#accordion">
                                          <div class="card-body">
                                                <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                          <input type="radio" class="form-check-input" name="optradio"><p>None</p> 
                                                        </label>
                                                      </div>
                                                      <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                          <input type="radio" class="form-check-input" name="optradio"><p>Cooper</p>
                                                        </label>
                                                      </div>
                                                      <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                              <input type="radio" class="form-check-input" name="optradio"><p>Gold</p>
                                                            </label>
                                                          </div>
                                                          <div class="form-check-inline">
                                                                <label class="form-check-label">
                                                                  <input type="radio" class="form-check-input" name="optradio"><p>Silver</p> 
                                                                </label>
                                                              </div>
                                                              <div class="form-check-inline">
                                                                <label class="form-check-label">
                                                                  <input type="radio" class="form-check-input" name="optradio"><p>Black</p>
                                                                </label>
                                                              </div>
                                                              <div class="form-check-inline">
                                                                    <label class="form-check-label">
                                                                      <input type="radio" class="form-check-input" name="optradio"><p>Red</p>
                                                                    </label>
                                                                  </div>
                                            
                                          </div>
                                        </div>
                                      </div>



                                                  <!--Lasercut-->

                                  <div class="card">
                                        <div class="card-header bg-white">
                                          <a class="collapsed card-link" data-toggle="collapse" href="#lasercut">
                                                <h6 class="text-dark d-inline"><b>Lasercut</b></h6>  
                                                <span class="badge badge-primary  d-inline float-right">single side</span>
                                          </a>
                                        </div>
                                        <div id="lasercut" class="collapse" data-parent="#accordion">
                                          <div class="card-body">
                                                <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                          <input type="radio" class="form-check-input" name="optradio"><p>Single Side </p> 
                                                        </label>
                                                      </div>
                                                    </div>
                                        </div>
                                      </div>


                                                                                        <!--Laser Engrave-->

                                  <div class="card">
                                        <div class="card-header bg-white">
                                          <a class="collapsed card-link" data-toggle="collapse" href="#laserengrave">
                                                <h6 class="text-dark d-inline"> <b>Laser Engrave</b></h6>
                                                <span class="badge badge-primary  d-inline float-right">single side </span> 
                                               
                                          </a>
                                        </div>
                                        <div id="laserengrave" class="collapse" data-parent="#accordion">
                                          <div class="card-body">
                                                <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                          <input type="radio" class="form-check-input" name="optradio"><p>None</p>  
                                                        </label>
                                                      </div>
                                                <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                          <input type="radio" class="form-check-input" name="optradio"><p>Single Side</p>  
                                                        </label>
                                                      </div>
                                                      <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                              <input type="radio" class="form-check-input" name="optradio"><p>Both Side</p>  
                                                            </label>
                                                          </div>
                                                    </div>
                                        </div>
                                      </div>


                                                <!--Embosing-->

                                  <div class="card">
                                        <div class="card-header bg-white">
                                          <a class="collapsed card-link" data-toggle="collapse" href="#embossing">
                                                <h6 class="text-dark d-inline"><b>Embosing</b></h6>
                                                <span class="badge badge-primary  d-inline float-right">single side </span>
                                          </a>
                                        </div>
                                        <div id="embossing" class="collapse" data-parent="#accordion">
                                          <div class="card-body">
                                                <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                          <input type="radio" class="form-check-input" name="optradio"><p>Single Side </p> 
                                                        </label>
                                                      </div>

                                        </div>
                                      </div>
                                  </div>


                                    <!--Silk Screen-->

                                  <div class="card">
                                        <div class="card-header bg-white">
                                          <a class="collapsed card-link" data-toggle="collapse" href="#SilkScreen">
                                                <h6 class="text-dark d-inline"><b>Silk Screen </b></h6>
                                                <span class="badge badge-primary  d-inline float-right">Both side </span>
                                             
                                          </a>
                                        </div>
                                        <div id="SilkScreen" class="collapse" data-parent="#accordion">
                                          <div class="card-body">

                                                <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                          <input type="radio" class="form-check-input" name="optradio"><p>None</p> 
                                                        </label>
                                                      </div>
                                                <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                          <input type="radio" class="form-check-input" name="optradio"><p>Single Side  </p>
                                                        </label>
                                                      </div>

                                                      <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                              <input type="radio" class="form-check-input" name="optradio"><p>Both Side  </p>
                                                            </label>
                                                          </div>

                                        </div>
                                      </div>
                                  </div>



                                                                      <!--Spotgloss-->

                                                                      <div class="card ">
                                                                            <div class="card-header bg-white">
                                                                              <a class="collapsed card-link" data-toggle="collapse" href="#spotgloss">
                                                                                  <h6 class="text-dark d-inline"><b> Spot gloss </b></h6>
                                                                                  <span class="badge badge-primary  d-inline float-right">Both side </span>
                                                                              </a>
                                                                            </div>
                                                                            <div id="spotgloss" class="collapse" data-parent="#accordion">
                                                                              <div class="card-body bg-white">
                                                                                    <div class="form-check-inline">
                                                                                            <label class="form-check-label">
                                                                                              <input type="radio" class="form-check-input" name="optradio"><p>None</p>  
                                                                                            </label>
                                                                                          </div>
                                                                                    <div class="form-check-inline">
                                                                                            <label class="form-check-label">
                                                                                              <input type="radio" class="form-check-input" name="optradio"><p>Single Side </p> 
                                                                                            </label>
                                                                                          </div>
                                    
                                                                                          <div class="form-check-inline">
                                                                                                <label class="form-check-label">
                                                                                                  <input type="radio" class="form-check-input" name="optradio"><p>Both Side</p>  
                                                                                                </label>
                                                                                              </div>

                                                                                              
                                    
                                                                            </div>
                                                                          </div>
                                                                      </div>





                                  







    </div><!--accordian close-->
  </div><!--col-md-5  close-->
    </div><!--first row close-->
</div><!--first container close-->

<div class="container bg-white">
    <h2 class="display-4 my-5"> Detail</h2>
<table class="table table-striped">
        <thead >
          <tr>
            <th ><h5>Category</h5></th>
            <th><h5>Product</h5></th>
            <th><h5>Quantity</h5></th>
            <th><h5>Size</h5></th>
            <th><h5>Paper</h5></th>
            <th><h5>Treatments</h5></th>
            <th><h5>AddOnProducts</h5></th>
          </tr>
        </thead>
        <tbody>
          <tr >
            <td>business card</td>
            <td>matt finish</td>
            <td>200</td>
            <td>5mm</td>
            <td>foiling</td>
            <td>null</td>
            <td>null</td>
          </tr>
          <tr>
                <td>business card</td>
                <td>matt finish</td>
                <td>200</td>
                <td>5mm</td>
                <td>foiling</td>
                <td>null</td>
                <td>null</td>
          <tr >
                <td>business card</td>
                <td>matt finish</td>
                <td>200</td>
                <td>5mm</td>
                <td>foiling</td>
                <td>null</td>
                <td>null</td>
          </tr>
        </tbody>
      </table><!--table close-->
    </div><!--table container close-->




<div class="container">
    <div class="row">
    

        <div class="col-md-3">
<div class="form-group">
    <label for="franchise"> </label>
    <select class="form-control">
        <option value="selected">ADD ON FRANCHISE</option>
        <option> Mohinder</option>
        <option> Mohinder</option>
    </select>

</div>
        </div>
        <div class="col-md-3">

<div class="form-group" >
        <label for="franchise"></label>
        <select class="form-control">
            <option value="">Select Clients</option>
            <option> Mohinder</option>
            <option> Mohinder</option>
        </select>
    
    </div>
        </div>

        <div class="col-md-3 mt-4">
            <button type="sybmit" class="btn btn-primary">Add order</button>
        </div>
        <div class="col-md-3 mt-4">
                <button type="submit" class="btn btn-primary"> Save Order</button>
        </div>
    
</div><!--row close-->
</div><!--container close-->


        

    



    @endsection