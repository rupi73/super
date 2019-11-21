@extends('template')
@section('content')

<div class="container">

    <div class="row">

        <div class="col-md-12">

            <h2 class="display-4">Addon Products Details</h2>
            <table class="table">

                <thead>
                    <tr>

         
                        <th>Franchise</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>GST</th>
                      
                        <th>Action</th>
                    </tr>
                </thead>
                    <tbody>
                        @foreach($data as $addon_products)
                        <tr>
                            <ul>
                            <td>{{$addon_products->franchise->name}}</td>
                           <td>{{$addon_products->name}}</td>
                           <td>{{$addon_products->price}}</td>
                           <td>{{$addon_products->gst}}</td>
                     
                       
                            <td>

                                    <form action="" method="POST">
                            
                                
                                    <a class="btn btn-primary" href="{{route('addonproducts.edit',$addon_products->id)}}">edit</a> 
                                            <a class="btn btn-primary" href="{{route('addonproducts.show',$addon_products->id)}}">show</a> 
                                        </form>

                                    </ul>
                                    @endforeach
                                    </td>


                        </tr>
                    </tbody>
                </table><!--end table-->
        </div><!--end colom-->
    </div><!--end row-->
</div><!--end container-->









@endsection