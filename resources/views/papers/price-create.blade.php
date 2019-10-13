@extends('template')
@section('content')
<div class="container">
    <h2>Papers Prices</h2><br>

    <div class="row mt-5">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                       <div class="dropdown">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
              Papers
            </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">matt finish</a>
                            <a class="dropdown-item" href="#">soft suede</a>
                            <a class="dropdown-item" href="#">texture</a>

                        </div>
                    </div><br>


                    <div class="dropdown">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                  Category
                </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Business card</a>
                            <a class="dropdown-item" href="#">Booklets</a>
                            <a class="dropdown-item" href="#">Coasters</a>

                        </div>
                    </div>
                </div>

                <div class="col-md-6">

                    <div class="dropdown">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                              Sizes
                            </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">2mm</a>
                            <a class="dropdown-item" href="#">4mm</a>
                            <a class="dropdown-item" href="#">5mm</a>

                        </div>
                    </div><br>




                    <div class="dropdown">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                Quantity
                                </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">100</a>
                            <a class="dropdown-item" href="#">200</a>
                            <a class="dropdown-item" href="#">500</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection