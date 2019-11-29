@extends('template')
@section('content')

<!--estimate-->

<div class="container">
    <div class="row">
        <div class="col-md-5">
    <h2 class="display-5 my-3">Estimate</h2>

    <div class="row">

            <div class="col-md-6">
                    <div class="form-group">
                        <label for="franchise"> </label>
                        <select class="custom-select">
                            <option value="selected">Select Category</option>
                            <option> Mohinder</option>
                            <option> Mohinder</option>
                        </select>
                    
                    </div>
                            </div>
                            <div class="col-md-6">
                    
                    <div class="form-group" >
                            <label for="franchise"></label>
                            <select class="custom-select">
                                <option value="">Select Products</option>
                                <option> Mohinder</option>
                                <option> Mohinder</option>
                            </select>
                        
                        </div>
                            </div>
    </div><!--estimate row close-->



  
    <div id="accordion">

      <h2 class="display-5 my-4">Calculator</h2>



      <div class="card">
        <div class="card-header">
          <a class="collapsed card-link" data-toggle="collapse" href="#paper">
                <h6 class="text-dark d-inline">Select Papers</h6>
                <h6 class="text-dark d-inline float-right">Matt-finish</h6>
          </a>
        </div>
        <div id="paper" class="collapse" data-parent="#accordion">
          <div class="card-body">
                <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="optradio">soft suede paper 350gsm
                        </label>
                      </div>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="optradio"> soft suede paper 500gsm
                        </label>
                      </div>
          </div>
        </div>
      </div><!--paper close-->

      <div class="card">
        <div class="card-header">
          <a class="collapsed card-link" data-toggle="collapse" href="#size">
                <h6 class="text-dark d-inline">Select size</h6>
                <h6 class="text-dark d-inline  float-right">3mm-5mm</h6>
          </a>
        </div>
        <div id="size" class="collapse" data-parent="#accordion">
          <div class="card-body">
              <table class="table">
                  <tbody>
                      <tr>
                          <td>
                <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="optradio"> 3.5 * 4.5
                        </label>
                      </div>
                          </td>
                      </tr>
                          <tr>
                              <td>
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="optradio"> 3.2 * 5.5
                        </label>
                      </div>
                              </td>
                          </tr>
                        </tbody>
              </table>
                
           
          </div>
        </div>
      </div><!--size close-->

      <div class="card">
            <div class="card-header">
              <a class="collapsed card-link" data-toggle="collapse" href="#printing">
                    <h6 class="text-dark d-inline">Select Printing</h6>
                    <h6 class="text-dark d-inline float-right">Single side</h6>
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
                              <input type="radio" class="form-check-input" name="optradio">Single side
                            </label>
                          </div>
                              </td>
                          </tr>

                          <tr>
                              <td>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="optradio"> Both side
                            </label>
                          </div>
                              </td>
                          </tr>
                      </tbody>
                  </table>
              </div>
            </div>
          </div><!--printing close-->

 




              <h2 class="display-5 py-5">Treatments</h2>
            <!--Raisespotgloss-->
              <div class="card">
                    <div class="card-header">
                      <a class="collapsed card-link" data-toggle="collapse" href="#raisespotgloss">
                            <h6 class="text-dark d-inline">Raisespotgloss</h6>  
                            <h6 class="text-dark d-inline float-right">single side</h6>  
                      </a>
                    </div>
                    <div id="raisespotgloss" class="collapse" data-parent="#accordion">
                      <div class="card-body">
                            <div class="form-check-inline">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="optradio">None 
                                    </label>
                                  </div>
                                  <div class="form-check-inline">
                                    <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="optradio">Single side
                                    </label>
                                  </div>
                                  <div class="form-check-inline">
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Both side
                                        </label>
                                      </div>
                        
                      </div>
                    </div>
                  </div>

                <!--Roundcorners-->
                  <div class="card">
                        <div class="card-header">
                          <a class="collapsed card-link" data-toggle="collapse" href="#roundcorners">
                                <h6 class="text-dark d-inline">Roundcorners</h6>
                                <h6 class="text-dark d-inline float-right">single side</h6>
                          </a>
                        </div>
                        <div id="roundcorners" class="collapse" data-parent="#accordion">
                          <div class="card-body">
                                <div class="form-check-inline">
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">None 
                                        </label>
                                      </div>
                                      <div class="form-check-inline">
                                        <label class="form-check-label">
                                          <input type="radio" class="form-check-input" name="optradio">Single side
                                        </label>
                                      </div>
                            
                          </div>
                        </div>
                      </div>

        <!--foiling-->              
                      <div class="card">
                            <div class="card-header">
                              <a class="collapsed card-link" data-toggle="collapse" href="#foiling">
                                    <h6 class="text-dark d-inline">Foiling</h6>
                                    <h6 class="text-dark d-inline float-right">Front-black Back-none</h6>

                              </a>
                            </div>
                            <div id="foiling" class="collapse" data-parent="#accordion">

                              <div class="card-body">
                                    <p class="ml-2">Front side  </p>
                                  <div class="row ml-2">

                                        
                                    <div class="form-check-inline ">
                                            <label class="form-check-label">
                                              <input type="radio" class="form-check-input" name="optradio">None 
                                            </label>
                                          </div>
                                          <div class="form-check-inline">
                                            <label class="form-check-label">
                                              <input type="radio" class="form-check-input" name="optradio">Cooper
                                            </label>
                                          </div>

                                          <div class="form-check-inline">
                                                <label class="form-check-label">
                                                  <input type="radio" class="form-check-input" name="optradio">Gold
                                                </label>
                                              </div>

                                              <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                      <input type="radio" class="form-check-input" name="optradio">Silver
                                                    </label>
                                                  </div>
                                                </div>
                                
                                                    <hr>
                                                <p class="ml-2 my-3">Back side</p>
                                                <div class="row ml-2">
                                                        
                                                      <div class="form-check-inline">
                                                              <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="optradio">None 
                                                              </label>
                                                            </div>
                                                            <div class="form-check-inline">
                                                              <label class="form-check-label">
                                                                <input type="radio" class="form-check-input" name="optradio">Cooper
                                                              </label>
                                                            </div>
                  
                                                            <div class="form-check-inline">
                                                                  <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="optradio">Gold
                                                                  </label>
                                                                </div>
                  
                                                                <div class="form-check-inline">
                                                                      <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="optradio">Silver
                                                                      </label>
                                                                    </div>
                                                                  </div>
                              </div>
                            </div>
                          </div>



                            <!--electroplating-->
                          <div class="card">
                                <div class="card-header">
                                  <a class="collapsed card-link" data-toggle="collapse" href="#electroplating">
                                        <h6 class="text-dark d-inline">Electroplating</h6>
                                        <h6 class="text-dark d-inline float-right">front-cooper back-none</h6>
                                  </a>
                                </div>
                                <div id="electroplating" class="collapse" data-parent="#accordion">
    
                                  <div class="card-body">
                                        <p class="ml-2">Front side  </p>
                                      <div class="row ml-2">
    
                                            
                                        <div class="form-check-inline ">
                                                <label class="form-check-label">
                                                  <input type="radio" class="form-check-input" name="optradio">None 
                                                </label>
                                              </div>
                                              <div class="form-check-inline">
                                                <label class="form-check-label">
                                                  <input type="radio" class="form-check-input" name="optradio">Cooper
                                                </label>
                                              </div>
    
                                              <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                      <input type="radio" class="form-check-input" name="optradio"> Rose Gold
                                                    </label>
                                                  </div>
    
                                                  <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                          <input type="radio" class="form-check-input" name="optradio">Silver
                                                        </label>
                                                      </div>
                                                    </div>
                                    <hr>
    
                                                    <p class="ml-2 my-3">Back side</p>
                                                    <div class="row ml-2">
                                                            
                                                          <div class="form-check-inline">
                                                                  <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="optradio">None 
                                                                  </label>
                                                                </div>
                                                                <div class="form-check-inline">
                                                                  <label class="form-check-label">
                                                                    <input type="radio" class="form-check-input" name="optradio">Cooper
                                                                  </label>
                                                                </div>
                      
                                                                <div class="form-check-inline">
                                                                      <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="optradio">Rose Gold
                                                                      </label>
                                                                    </div>
                      
                                                                    <div class="form-check-inline">
                                                                          <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input" name="optradio">Silver
                                                                          </label>
                                                                        </div>
                                                                      </div>
                                  </div>
                                </div>
                              </div>




                              <!--letterpress-->


                              <div class="card">
                                    <div class="card-header">
                                      <a class="collapsed card-link" data-toggle="collapse" href="#letterpress">
                                            <h6 class="text-dark d-inline">Letterpress</h6>
                                            <h6 class="text-dark d-inline float-right">front-cooper back-none</h6>        
                                      </a>
                                    </div>
                                    <div id="letterpress" class="collapse" data-parent="#accordion">
        
                                      <div class="card-body">
                                            <p class="ml-2">Front side  </p>
                                          <div class="row ml-2">
        
                                                
                                            <div class="form-check-inline ">
                                                    <label class="form-check-label">
                                                      <input type="radio" class="form-check-input" name="optradio">None 
                                                    </label>
                                                  </div>
                                                  <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                      <input type="radio" class="form-check-input" name="optradio">Black
                                                    </label>
                                                  </div>
        
                                                  <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                          <input type="radio" class="form-check-input" name="optradio">Blue
                                                        </label>
                                                      </div>
        
                                                      <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                              <input type="radio" class="form-check-input" name="optradio">Orange
                                                            </label>
                                                          </div>
                                                        </div>
                                        <hr>
        
                                                        <p class="ml-2 my-3">Back side</p>
                                                        <div class="row ml-2">
                                                                
                                                              <div class="form-check-inline">
                                                                      <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="optradio">None 
                                                                      </label>
                                                                    </div>
                                                                    <div class="form-check-inline">
                                                                      <label class="form-check-label">
                                                                        <input type="radio" class="form-check-input" name="optradio">Black
                                                                      </label>
                                                                    </div>
                          
                                                                    <div class="form-check-inline">
                                                                          <label class="form-check-label">
                                                                            <input type="radio" class="form-check-input" name="optradio">Blue 
                                                                          </label>
                                                                        </div>
                          
                                                                        <div class="form-check-inline">
                                                                              <label class="form-check-label">
                                                                                <input type="radio" class="form-check-input" name="optradio">Orange
                                                                              </label>
                                                                            </div>
                                                                          </div>
                                      </div>
                                    </div>
                                  </div>



                                  <!--edgepaint-->

                                  <div class="card">
                                        <div class="card-header">
                                          <a class="collapsed card-link" data-toggle="collapse" href="#edgepaint">
                                                <h6 class="text-dark d-inline">Edgepaint</h6> 
                                                <h6 class="text-dark d-inline float-right">cooper</h6>  
                                          </a>
                                        </div>
                                        <div id="edgepaint" class="collapse" data-parent="#accordion">
                                          <div class="card-body">
                                                <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                          <input type="radio" class="form-check-input" name="optradio">None 
                                                        </label>
                                                      </div>
                                                      <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                          <input type="radio" class="form-check-input" name="optradio">Cooper
                                                        </label>
                                                      </div>
                                                      <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                              <input type="radio" class="form-check-input" name="optradio">Gold
                                                            </label>
                                                          </div>
                                                          <div class="form-check-inline">
                                                                <label class="form-check-label">
                                                                  <input type="radio" class="form-check-input" name="optradio">Silver 
                                                                </label>
                                                              </div>
                                                              <div class="form-check-inline">
                                                                <label class="form-check-label">
                                                                  <input type="radio" class="form-check-input" name="optradio">Black
                                                                </label>
                                                              </div>
                                                              <div class="form-check-inline">
                                                                    <label class="form-check-label">
                                                                      <input type="radio" class="form-check-input" name="optradio">Red
                                                                    </label>
                                                                  </div>
                                            
                                          </div>
                                        </div>
                                      </div>



                                                  <!--Lasercut-->

                                  <div class="card">
                                        <div class="card-header">
                                          <a class="collapsed card-link" data-toggle="collapse" href="#lasercut">
                                                <h6 class="text-dark d-inline">Lasercut</h6>  
                                                <h6 class="text-dark d-inline float-right">single side</h6>  
                                          </a>
                                        </div>
                                        <div id="lasercut" class="collapse" data-parent="#accordion">
                                          <div class="card-body">
                                                <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                          <input type="radio" class="form-check-input" name="optradio">Single Side  
                                                        </label>
                                                      </div>
                                                    </div>
                                        </div>
                                      </div>


                                                                                        <!--Laser Engrave-->

                                  <div class="card">
                                        <div class="card-header">
                                          <a class="collapsed card-link" data-toggle="collapse" href="#laserengrave">
                                                <h6 class="text-dark d-inline">   Laser Engrave </h6>
                                                <h6 class="text-dark d-inline float-right">single side</h6>  
                                               
                                          </a>
                                        </div>
                                        <div id="laserengrave" class="collapse" data-parent="#accordion">
                                          <div class="card-body">
                                                <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                          <input type="radio" class="form-check-input" name="optradio">None  
                                                        </label>
                                                      </div>
                                                <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                          <input type="radio" class="form-check-input" name="optradio">Single Side  
                                                        </label>
                                                      </div>
                                                      <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                              <input type="radio" class="form-check-input" name="optradio">Both Side  
                                                            </label>
                                                          </div>
                                                    </div>
                                        </div>
                                      </div>


                                                <!--Embosing-->

                                  <div class="card">
                                        <div class="card-header">
                                          <a class="collapsed card-link" data-toggle="collapse" href="#embossing">
                                                <h6 class="text-dark d-inline">Embosing</h6>
                                                <h6 class="text-dark d-inline float-right">single side</h6>  
                                          </a>
                                        </div>
                                        <div id="embossing" class="collapse" data-parent="#accordion">
                                          <div class="card-body">
                                                <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                          <input type="radio" class="form-check-input" name="optradio">Single Side  
                                                        </label>
                                                      </div>

                                        </div>
                                      </div>
                                  </div>


                                    <!--Silk Screen-->

                                  <div class="card">
                                        <div class="card-header">
                                          <a class="collapsed card-link" data-toggle="collapse" href="#SilkScreen">
                                                <h6 class="text-dark d-inline">Silk Screen </h6>
                                                <h6 class="text-dark d-inline float-right">Both side</h6>  
                                             
                                          </a>
                                        </div>
                                        <div id="SilkScreen" class="collapse" data-parent="#accordion">
                                          <div class="card-body">

                                                <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                          <input type="radio" class="form-check-input" name="optradio">None 
                                                        </label>
                                                      </div>
                                                <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                          <input type="radio" class="form-check-input" name="optradio">Single Side  
                                                        </label>
                                                      </div>

                                                      <div class="form-check-inline">
                                                            <label class="form-check-label">
                                                              <input type="radio" class="form-check-input" name="optradio">Both Side  
                                                            </label>
                                                          </div>

                                        </div>
                                      </div>
                                  </div>



                                                                      <!--Spotgloss-->

                                                                      <div class="card">
                                                                            <div class="card-header">
                                                                              <a class="collapsed card-link" data-toggle="collapse" href="#spotgloss">
                                                                                  <h6 class="text-dark d-inline"> Spot gloss </h6>
                                                                                  <h6 class="text-dark d-inline float-right">single side</h6>  
                                                                              </a>
                                                                            </div>
                                                                            <div id="spotgloss" class="collapse" data-parent="#accordion">
                                                                              <div class="card-body">
                                                                                    <div class="form-check-inline">
                                                                                            <label class="form-check-label">
                                                                                              <input type="radio" class="form-check-input" name="optradio">None  
                                                                                            </label>
                                                                                          </div>
                                                                                    <div class="form-check-inline">
                                                                                            <label class="form-check-label">
                                                                                              <input type="radio" class="form-check-input" name="optradio">Single Side  
                                                                                            </label>
                                                                                          </div>
                                    
                                                                                          <div class="form-check-inline">
                                                                                                <label class="form-check-label">
                                                                                                  <input type="radio" class="form-check-input" name="optradio">Both Side  
                                                                                                </label>
                                                                                              </div>

                                                                                              
                                    
                                                                            </div>
                                                                          </div>
                                                                      </div>





                                  







    </div><!--first container close-->
  </div><!--col-md-5  close-->
    </div><!--first row close-->
</div><!--first container close-->

<div class="container">
    <h2 class="display-4 my-5"> Detail</h2>
<table class="table table-striped">
        <thead>
          <tr>
            <th>Category</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Size</th>
            <th>Paper</th>
            <th>Treatments</th>
            <th>AddOnProducts</th>
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