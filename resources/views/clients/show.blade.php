@extends('template')
@section('content')
<style>
  body {
    background-color: #000
  }

  .padding {
    padding: 2rem !important
  }

  .card {
    margin-bottom: 30px;
    bclients: none;
    -webkit-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
    -moz-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
    box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22)
  }

  .card-header {
    background-color: #fff;
    bclients-bottom: 1px solid #e6e6f2
  }

  h3 {
    font-size: 20px
  }

  h5 {
    font-size: 15px;
    line-height: 26px;
    color: #3d405c;
    margin: 0px 0px 15px 0px;
    font-family: 'Circular Std Medium'
  }

  .text-dark {
    color: #3d405c !important
  }
</style>
<b-container class="bv-example-row" id="vclientsshow">
  <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
    <div class="card">
      <div class="card-header p-4">
        @if(\Gate::allows('super',\App\Category::class))
        <a class="pt-2 d-inline-block" href="index.html" data-abc="true">{{$client->franchise['name']}}</a>
        @else
        <img src="{{asset('assets/images/logo.png')}}" alt="chhapai" height="45px" width="110px">
        @endif
        <div class="float-right">
          <h3 class="mb-0">Client #{{$client->name}}</h3>
          Date Added: {{$client->updated_at->format('d-m-Y')}}
        </div>
      </div>
      <div class="card-body">
        <div class="row mb-4">
          <div class="col-sm-4">

            <div>Name : {{$client->name}}</div>

            <div>Email : {{$client->email}}</div>
            <div>Mobile : {{$client->mobile}}</div>

          </div>


          <div class="col-sm-4">
            <div>City :{{$client->city}}</div>
            <div>State :{{$client->state}}</div>
            <div>Country : {{$client->mobile}}</div>


          </div>

          <div class="col-sm-4 ">
            <div>Total Orders :{{$client->city}}</div>
            <div>Last Order :{{$client->state}}</div>
            <div>... : ...</div>
          </div>
        </div>
        <div class="table-responsive-sm">
          <template>
            <div>
              <b-table small :fields="fields" :items="products" responsive="sm">
                <!-- A custom formatted column -->
                <template v-slot:cell(description)="row">
                  <b-card>
                    <b-row class="mb-2">
                      <b-col sm="6" class="text-sm-left mb-1"><b>Paper:</b></b-col>
                      <b-col>@{{ row.item.description.paper }}</b-col>
                      <b-col sm="6" class="text-sm-left "><b>Size:</b></b-col>
                      <b-col>@{{ row.item.description.size }}</b-col>
                    </b-row>
                    <b-row class="mb-2">
                      <b-col sm="6" class="text-sm-left mb-1"><b>Print:</b></b-col>
                      <b-col>@{{ row.item.description.printing }}</b-col>
                      <b-col sm="6" class="text-sm-left mb-1"><b>Quantity:</b></b-col>
                      <b-col>
                        <template>
                          <p>
                            <b>@{{row.item.description.quantities}}:-</b>@{{row.item.description.prices[row.item.description.quantities]}}
                          </p>
                        </template></b-col>
                    </b-row>
                    <b-row class="mb-2">
                      <b-col sm="6" class="text-sm-left mb-1"><b>Treatments:</b></b-col>
                      <b-col>
                        <p v-for="(treat,keyt,indext) of row.item.description.treatments"><b>@{{keyt}}</b>@{{treat}}</p>
                      </b-col>
                    </b-row>
                    <b-row class="mb-2">
                      <b-col sm="6" class="text-sm-left"><b>Addons:</b></b-col>
                      <b-col>
                        <p v-for="add of row.item.description.addOns"><b>@{{add.name + ':' + add.price}}</b></p>
                      </b-col>
                    </b-row>
                  </b-card>
                </template>

                <!-- A custom formatted column -->
                <template v-slot:cell(margin)="data">
                  <b class="text-info">₹@{{ data.item.margin}}</b>
                </template>
                <!-- A custom formatted column -->
                <template v-slot:cell(price)="data">
                  <b class="text-info">₹@{{ data.item.price }}</b>
                </template>
                <!-- A custom formatted column -->
                <template v-slot:cell(tax)="data">
                  <b class="text-info">@{{ data.item.tax }}%</b>
                </template>

              </b-table>
            </div>
          </template>
        </div>

      </div>

    </div>
  </div>
  @{{clients}}
</b-container>

@endsection
@section('scripts')
<script>
  var vm = new Vue({
    el:'#vclientsshow',
    data() {
      return {
        fields: [
          // A virtual column that doesn't exist in items
          { key: 'date', label: 'Date' },
          // A column that needs custom formatting
          { key: 'franchise', label: 'Franchise' },
             // A regular column
          { key: 'orderamount', label: 'Order Amount' },
          // A regular column
          { key: 'margin', label: 'Margin' },
          // A virtual column made up from two fields
          { key: 'product', label: 'Product' },
          { key: 'status', label: 'Status' },
          { key: 'action', label: 'Action' }
        
        ],
        products: []
      }
    },
    methods:{

    },
    mounted:function(){
        this.$nextTick(function(){
              let products = [];
              @php
              /*foreach($client->products as $op){
            print "vm.products.push({name:'{$op->product->name}',category:'ddfdf',quantity:'{$op->quantity->label}',description:{$op->description},margin:'{$op->margin}',price:'{$op->price}',tax:'{$op->taxp}'});";
           print 'console.log('.$op->description.');';
            
            }*/
              @endphp
             
          })
    }
});
</script>
@endsection