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
    border: none;
    -webkit-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
    -moz-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
    box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22)
  }

  .card-header {
    background-color: #fff;
    border-bottom: 1px solid #e6e6f2
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
<b-container class="bv-example-row" id="vquoteshow">
  <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
    <div class="card">
      <div class="card-header p-4">
        @if(\Gate::allows('super',\App\Category::class))
        <a class="pt-2 d-inline-block" href="index.html" data-abc="true">{{$quote->franchise['name']}}</a>
        @else
        <img src="{{asset('assets/images/logo.png')}}" alt="chhapai" height="45px" width="110px">
        @endif
        <div class="float-right">
          <h3 class="mb-0">Quote #{{$quote->id}}</h3>
          Date: {{$quote->updated_at->format('d-m-Y')}}
        </div>
      </div>
      <div class="card-body">
        <div class="row mb-4">
          <div class="col-sm-6">
            <h5 class="mb-3">To:</h5>
            <h3 class="text-dark mb-1">{{$quote->client['name']}}</h3>
            <div>{{$quote->client['city']}}</div>
            <div>{{$quote->client['state']}}</div>
            <div>Email: {{$quote->client['email']}}</div>
            <div>Phone: {{$quote->client['mobile']}}</div>
          </div>

        </div>
        <div class="table-responsive-sm">
          <template>
            <div>
              <b-table small :fields="fields" :items="products" responsive="sm">
                <!-- A custom formatted column -->
                <template v-slot:cell(product.quantities)="row">
                  <div v-for="(qty,key,index) of row.item.quantities">@{{qty}}:₹ (@{{row.item.mprices[qty]}} /
                    @{{row.item.prices[qty]}})</div>


                </template>

                <template v-slot:cell(description)="row">
                  <b-card>
                    <b-row class="mb-2">
                      <b-col sm="6" class="text-sm-left mb-1"><b>Paper:</b></b-col>
                      <b-col>@{{ row.item.paper }}</b-col>
                      <b-col sm="6" class="text-sm-left "><b>Size:</b></b-col>
                      <b-col>@{{ row.item.size }}</b-col>
                    </b-row>
                    <b-row class="mb-2">
                      <b-col sm="6" class="text-sm-left mb-1"><b>Print:</b></b-col>
                      <b-col>@{{ row.item.printing }}</b-col>
                      <b-col sm="6" class="text-sm-left mb-1"><b>Quantity:</b></b-col>
                      <b-col>
                        <template>
                          <p><b>@{{row.item.quantities}}:-</b>@{{row.item.prices[row.item.quantities]}}</p>
                        </template></b-col>
                    </b-row>
                    <b-row class="mb-2">
                      <b-col sm="6" class="text-sm-left mb-1"><b>Treatments:</b></b-col>
                      <b-col>
                        <p v-for="(treat,keyt,indext) of row.item.treatments"><b>@{{keyt}}</b>@{{treat}}</p>
                      </b-col>
                    </b-row>
                    <b-row class="mb-2">
                      <b-col sm="6" class="text-sm-left"><b>Addons:</b></b-col>
                      <b-col>
                        <p v-for="add of row.item.addOns"><b>@{{add.name + ':' + add.price}}</b></p>
                      </b-col>
                    </b-row>
                  </b-card>
                </template>



              </b-table>
            </div>
          </template>
        </div>

      </div>

    </div>
  </div>
  @{{products}}
</b-container>

@endsection
@section('scripts')
<script>
  var vm = new Vue({
    el:'#vquoteshow',
    data() {
      return {
        fields: [
          // A virtual column that doesn't exist in items
          { key: 'product.name', label: 'Product' },
          // A column that needs custom formatting
          { key: 'description', label: 'Description' },
          // A regular column
          { key: 'product.quantities', label: 'Qty / Prices' },
          // A regular column
          
          
        
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
              //foreach($quote->estimateJson as $op){
            print "vm.products=JSON.parse('$quote->estimateJson');";
           //print 'console.log('.$op.');';
            
            //}
              @endphp
             
          })
    }
});
</script>
@endsection