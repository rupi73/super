@extends('template')
@section('content')


    <!--client-->

    <div class=" col-md-8">
        
            <div class="card">
                
                <div class="card-body">
                    <div class="title">
                        <h2>Client</h2></div>
                        <div class="card-content">
                        <form action="" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="franchise">Franchise</label>
                                <select class="custom-select ">
                                    <option>1</option>
                                    <option>1</option>
                                    <option>1</option>
                                    <option>1</option>
                                </select>
                            </div>

                            <div class="form-group">
                                    <label for="Name">Name</label>
                                    <input type="text" class="form-control" id="name" >
                                   
                                </div>

                                <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" >
                                       
                                    </div>

                                    <div class="form-group">
                                            <label for="contact">contact No</label>
                                            <input type="text" class="form-control" id="contact" >
                                           
                                        </div>

                                        <button type="button" class="btn btn-primary">Submit</button>

                        </form>
                    </div>
        </div>

@endsection
