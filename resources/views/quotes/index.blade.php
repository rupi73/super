@extends('template')
@section('content')

<div class="container">

    <div class="row">

        <div class="col-md-12">

            <h5>Quotes</h5>
            <table class="table">

                <thead>
                    <tr>

         
                        <th>Date</th>
                        <th>Client</th>
                        <th>Products</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                    <tbody>
                            @foreach($quotes as $quote)
                        <tr>
                     <ul>
                        <td>{{$quote->created_at}}</td>
                            <td>{{$quote->client->name}}
                                {{$quote->franchise->name}}
                            </td>
                            <td>
                                <ul>
                              @foreach($quote->estimate as $estimate)
                                <li>{{$estimate->product->name}}</li>
                            @endforeach
                          </ul>
                            </td>
                            <td>

                                    <form action="" method="POST">
                            
                                
                                    <a class="btn btn-primary" href="{{route('quotes.show',$quote->id)}}" >Show</a> 
                
                                                <a class="btn btn-primary" href="{{route('quotes.edit',$quote->id)}}" >Edit</a> 
                
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