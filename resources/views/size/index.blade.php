@extends('template')
@section('content')


<div class="container" id="vapp">
        @foreach($sizes as $size)
        <div class="row">
                <div class="col-md-8">

                        <div class="card my-4">
                                <div class="card-body">

                                        <h4 class="card-title">{{$size->label}}</h4>
                                        <div class="row">
                                                <div class="col-md-4">
                                                        <p class="card-text">{{$size->value}}</p>
                                                </div>
                                                <div class="col-md-4">
                                                        <p class="card-text">
                                                                @foreach($size->categories as $sc)
                                                                {{$sc->name. (!$loop->last?',':'')}}
                                                                @endforeach
                                                        </p>
                                                </div>
                                                <div class="col-md-4">
                                                        <a href="{{route('sizes.edit',$size->id)}}"
                                                                class="card-link">Edit</a>
                                                        <a href="javascript:void(0);" class="card-link btn btn-success"
                                                                @click="deleteRecord({{$size->id}})">Delete</a>
                                                        <form action="{{route('sizes.destroy',$size->id)}}"
                                                                id="form-delete-{{$size->id}}" method="POST">
                                                                @method('delete')
                                                                @csrf
                                                        </form>
                                                </div>


                                        </div>
                                        <!--row-->
                                </div>
                        </div>
                </div>
        </div><!--row-->
        <hr>
        @endforeach
        {{$sizes->links()}}
</div>
@endsection

@section('scripts')
@include('partials.delete');
@endsection