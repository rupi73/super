@extends('template')
@section('content')

<div class="container">

    <div class="row">

        <div class="col-md-12">

            <h2 class="display-4">Clients Details</h2>
            <table class="table">

                <thead>
                    <tr>

         
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Franchise Name</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Country</th>
                        <th>Action</th>
                    </tr>

                    <tbody>
                            @foreach($data as $clients)
                        <tr>
                     <ul>
                        <td>{{$clients->name}}</td>
                            <td>{{$clients->email}}</td>
                            <td>{{$clients->mobile}}</td>
                            <td>{{$clients->franchise_id}}</td>
                            <td>{{$clients->city}}</td>
                            <td>{{$clients->state}}</td>
                            <td>{{$clients->country}}</td>
                            <td>

                                    <form action="" method="POST">
                            
                                
                                    <a class="btn btn-primary" href="{{route('clients.show',$clients->id)}}" >Show</a> 
                
                                                <a class="btn btn-primary" href="{{route('clients.edit',$clients->id)}}" >Edit</a> 
                
                                        </form>
                            </td>
                        </ul>
                        @endforeach
                        </tr>
                    </tbody>
                </thead>
        </div>
    </div>
</div>









@endsection