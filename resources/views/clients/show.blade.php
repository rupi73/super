@extends('template')
@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-8">

            <div class="card">
                <div class="title">
                    
                    <h2 class="display-5">SHOW DEATILS</h2>
                </div>
                    <div class="content">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Name:</td>
                                    <td>{{$clients->name}}</td>    
                                </tr>
                                <tr>
                                        <td>Email:</td>
                                        <td>{{$clients->email}}</td>
                                </tr>

                                        <tr>
                                                <td>Mobile NO</td>
                                                <td>{{$clients->mobile}}</td>    
                                            </tr>

                                                 <tr>
                                                    <td>Franchise Name</td>
                                                    <td>{{$clients->franchise_id}}</td>    
                                                </tr>

                                                <tr>
                                                        <td>City</td>
                                                        <td>{{$clients->city}}</td>    
                                                    </tr>

                                                    <tr>
                                                            <td>state</td>
                                                            <td>{{$clients->state}}</td>    
                                                        </tr>

                                                        <tr>
                                                                <td>Country</td>
                                                                <td>{{$clients->country}}</td>    
                                                            </tr>

                            </thead>
                        </table> 
                                   
                               

                    
                </div><!--close  content-->
            </div><!--close  card-->
            
        </div><!--close  col-md-8-->
    </div><!--close  row-->
</div><!--close  container-->


@endsection

