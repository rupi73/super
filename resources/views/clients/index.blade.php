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
                </thead>
                    <tbody>
                            @foreach($clients as $client)
                        <tr>
                     <ul>
                        <td>{{$client->name}}</td>
                            <td>{{$client->email}}</td>
                            <td>{{$client->mobile}}</td>
                            <td>{{$client->users->name}}</td>
                            <td>{{$client->city}}</td>
                            <td>{{$client->state}}</td>
                            <td>{{$client->country}}</td>
                            <td>

                                    <form action="" method="POST">
                            
                                
                                    <a class="btn btn-primary" href="{{route('clients.show',$client->id)}}" >Show</a> 
                
                                                <a class="btn btn-primary" href="{{route('clients.edit',$client->id)}}" >Edit</a> 
                
                                        </form>
                            </td>
                        </ul>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
        </div>
    </div>
</div>









@endsection