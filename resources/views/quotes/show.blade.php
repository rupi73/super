@extends('template')
@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center my-5">Quote Detail</h2>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <h5>Quote :{{$quote->id}}</h5>

                        </div>

                        <div class="col-md-3">
                            <h5>Client :{{$quote->client['name']}}</h5>

                        </div>

                        <div class="col-md-3">
                            <h5>Franchise :{{$quote->franchise['name']}}</h5>

                        </div>

                        <div class="col-md-3">
                            <h5>Date :{{$quote->updated_at}}</h5>

                        </div>

                    </div>
                    <!--first row close-->



                    <!--second row close-->

                </div>
                <!--card body close-->
            </div>
            <!--card close-->

            <hr>
            <h2 class="text-center my-5">Product Detail</h2>


            <table class="table">

                <thead>
                    <tr>

                        <th>Name</th>                
                        <th>Description</th>
                        <th>Quantity</th>



                    </tr>
                </thead>
                <tbody>
                    @foreach($quote->estimate as $estimate)
                    <tr>
                        <td>{{$estimate->product->name}}</td>
                        <td>{{get_html_description_quotes($estimate)}}</td>
                        <td>{!!get_quantities_price_quotes($estimate)!!}</td>


                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!--table close-->






        </div>
        <!--close  col-md-12-->
    </div>
    <!--close  row-->
</div>
<!--close  container-->


@endsection