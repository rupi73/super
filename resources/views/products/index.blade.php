@extends('template')
@section('content')
<div class="container" id="vapp">
  <div class="row">
    <h2>Products</h2>

    @foreach($products as $product)
    <div class="col-md-12 mt-5">
      <div class="card">
        <div class="card-body">
          <div class="card-title">

            <h4><b>Name :</b>{{$product->name}} <b>Category:</b>{{$product->category->name}}</h4>
            <h4><b>Sizes :</b>@foreach($product->sizes as $size)
              {{$size->label}},
              @endforeach
            </h4>
            <h4><b>Quantities :</b>@foreach($product->quantities as $quantity)
              {{$quantity->label}},
              @endforeach
            </h4>
            <h4><b>Papers :</b>@foreach($product->papers as $paper)
              {{$paper->name}},
              @endforeach
            </h4>

            <h4><b>Price : {{$product->price}}</b>
            </h4>
            @can('super',\App\Product::class)
            <a href="{{route('products.edit',$product->id)}}" class="card-link btn btn-success">Edit</a>
            <a href="javascript:void(0);" class="card-link btn btn-success"
              @click="deleteRecord({{$product->id}})">Delete</a>
            <form action="{{route('products.destroy',$product->id)}}" id="form-delete-{{$product->id}}" method="POST">
              @method('delete')
              @csrf
            </form>
            @endcan

          </div>
          <!--card title-->
        </div>
        <!--card body-->

      </div>
      <!--card-->


    </div>
    <!--col-md-12-->
    <hr>
    @endforeach
    {{$products->links()}}
  </div>
  <!--row-->
</div>
<!--container-->




@endsection

@section('scripts')
@include('partials.delete');
@endsection