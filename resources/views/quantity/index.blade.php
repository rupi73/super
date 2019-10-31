@extends('template')
@section('content')


<div class="container" id="vapp">
        @foreach($quantities as $quantity)
        <div class="row">
                <div class="col-md-8">

                        <div class="card my-4">
                                <div class="card-body">

                                        <h4 class="card-title">{{$quantity->label}}</h4>
                                        <div class="row">
                                                <div class="col-md-4">
                                                        <p class="card-text">{{$quantity->value}}</p>
                                                </div>
                                                <div class="col-md-4">
                                                        <p class="card-text">
                                                                @foreach($quantity->categories as $qc)
                                                                {{$qc->name. (!$loop->last?',':'')}}
                                                                @endforeach
                                                        </p>
                                                </div>
                                                <div class="col-md-4">
                                                        <a href="{{route('quantity.edit',$quantity->id)}}"
                                                                class="card-link">Edit</a>
                                                        <a href="javascript:void(0);" class="card-link btn btn-success"
                                                                @click="deleteRecord({{$quantity->id}})">Delete</a>
                                                        <form action="{{route('quantity.destroy',$quantity->id)}}"
                                                                id="form-delete-{{$quantity->id}}" method="POST">
                                                                @method('delete')
                                                                @csrf
                                                        </form>
                                                </div>


                                        </div>
                                </div>
                        </div>
                </div>
        </div>
        <hr>
        @endforeach
        {{$quantities->links()}}
</div>
        @endsection

        @section('scripts')
        @include('partials.delete')
        @endsection