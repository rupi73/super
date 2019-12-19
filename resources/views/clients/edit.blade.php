@extends('template')
@section('content')


    <!--client-->

    <div class=" col-md-8">
        
            <div class="card">
                
                <div class="card-body">
                    <div class="title">
                        <h2>Client</h2></div>
                        <div class="card-content">
                        <form action="{{route('clients.update',$client->id)}}" method="POST">
                            @csrf
                            @method('patch')
                            @if(\Gate::allows('super',\App\Category::class))
                            <div class="form-group">
                                <label for="franchise">Franchise</label>
                                <select class="custom-select " name="franchise_id">
                                    @foreach($franchises as $franchise)
                                    <optgroup label="{{$franchise->name}}">
                                            @foreach($franchise->users as $user)
                                            <option value="{{$user->id}}" {{$user->id==$client->franchise_id?"selected":""}}>{{$user->name}}</option>
                                            @endforeach
                                            </optgroup>
                                            @endforeach
                                </select>
                            </div>
                            @else
                        <input type="hidden" name="franchise_id" value="{{$client->franchise_id}}"/>
                            @endif
                            <div class="row">
                                <div class="col">
                            <div class="form-group">
                                    <label for="Name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{$client->name}}" >
                                   
                                </div>
                            </div>


                            <div class="col">
                                <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" value="{{$client->email}}">
                                       
                                    </div>
                            </div>
                        </div>

                                    <div class="form-group">
                                            <label for="contact">Mobile No</label>
                                            <input type="text" class="form-control" id="mobile" name="mobile" value="{{$client->mobile}}">
                                           
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                        <div class=" form-group">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control" id="city" name="city" value="{{$client->city}}">
                                           
                                        </div>
                                            </div>

                                        
                                        <div class="col">
                                                <div class="form-group">                                        
                                            <label for="state">State</label>
                                            <input type="text" class="form-control" id="state" name="state" value="{{$client->state}}">
                                           
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <input type="text" class="form-control" id="country" name="country" value="{{$client->country}}" >
                                           
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
