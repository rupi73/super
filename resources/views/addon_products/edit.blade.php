@extends('template')
@section('content')
<div class="container">
        <h2  class=" mt-5">CREATE ADDON PRODUCTS</h2>
    <div class="row">
        
        <div class="col-md-8 mt-5">
        <form action="{{route('addonproducts.update',$addon_products->id)}}" method="POST">
                @method('patch')
            @csrf
          
                <div class="form-group">
                    <label for="franchise_id">Franchise_id</label>
                    <select class="form-control" name="franchise_id"  value="{{$addon_products->franchise_id}}">
                        <option>1</option>
                        <option>1</option>
                        <option>1</option>
                        <option>1</option>
                        
                    </select>

                </div>

                <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" value="{{$addon_products->name}}">
    
                </div>

                <div class="form-group">
                        <label for="Price">Price</label>
                        <input type="text" class="form-control" name="price"  value="{{$addon_products->price}}">
    
                </div>

                <div class="form-group">
                        <label for="GST">GST</label>
                        <input type="text" class="form-control" name="gst"  value="{{$addon_products->gst}}">
    
                </div>

             
               <Button type="submit" class="btn btn-primary">Save</Button>
            </form><!--end form-->
        </div><!--end colom-->
    </div><!--end row-->
</div><!--end container-->

@endsection