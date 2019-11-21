@extends('template')
@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-6">

            <div class="card">
                <div class="title">
                    
                    <h2 class="display-5">SHOW ADDON PRODUCT DEATILS</h2>
                </div>
                    <div class="content">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Franchise_ID</td>
                                    <td>{{$addon_products->franchise_id}}</td>    
                                </tr>
                                <tr>
                                        <td>Name</td>
                                        <td>{{$addon_products->name}}</td>
                                </tr>

                                        <tr>
                                                <td>Price </td>
                                                <td>{{$addon_products->price}}</td>    
                                            </tr>

                                                 <tr>
                                                    <td>GST </td>
                                                    <td>{{$addon_products->gst}}</td>    
                                                </tr>

                                               

                                                   

                                            </tbody>
                        </table> <!--end table-->
                                   
                               

                    
                </div><!--close  content-->
            </div><!--close  card-->
            
        </div><!--close  col-md-8-->
    </div><!--close  row-->
</div><!--close  container-->


@endsection

