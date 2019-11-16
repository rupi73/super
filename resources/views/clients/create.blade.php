@extends('template')
@section('content')


    <!--client-->

    <div class=" col-md-8">
        
            <div class="card">
                
                <div class="card-body">
                    <div class="title">
                        <h2>Client</h2></div>
                        <div class="card-content">
                        <form action="{{route('clients.store')}}" method="POST">
                            @csrf
                            
                            <div class="form-group">
                                <label for="franchise">Franchise</label>
                                <select class="custom-select " name="franchise_id">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col">
                            <div class="form-group">
                                    <label for="Name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" >
                                   
                                </div>
                            </div>


                            <div class="col">
                                <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email">
                                       
                                    </div>
                            </div>
                        </div>

                                    <div class="form-group">
                                            <label for="contact">Mobile No</label>
                                            <input type="text" class="form-control" id="mobile" name="mobile">
                                           
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                        <div class=" form-group">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control" id="city" name="city">
                                           
                                        </div>
                                            </div>

                                        
                                        <div class="col">
                                                <div class="form-group">                                        
                                            <label for="state">State</label>
                                            <input type="text" class="form-control" id="state" name="state" >
                                           
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <input type="text" class="form-control" id="country" name="country" >
                                           
                                        </div>
                                    </div>
                                </div>

                                     

                                        <button type="submit" class="btn btn-primary">Submit</button>

                        </form>
                    </div>
        </div>
            </div>
    </div>
@endsection
