@extends('template')
@section('content')
<b-container class="bv-example-row" id="vorders">
    <b-row>
        <h1 class="display-5 my-3 "><b>Orders</b></h1>
      </b-row>
      <b-row>
        <b-col cols="12">
                <template>
                        <div>
                          <b-table small :fields="fields" :items="orders" responsive="sm">
                                <template v-slot:cell(margin)="data">
                                        <b>₹</b>@{{ data.item.margin }}
                                      </template>
                                      <template v-slot:cell(amount)="data">
                                            <b>₹</b>@{{ data.item.amount }}
                                          </template>
                            <!-- A virtual composite column -->
      <template v-slot:cell(action)="data">
      <a  :href="url + 'orders/edit/1/'+ data.item.id" class="btn btn-sm mr-1 btn-dark">
                    <i class="ti-eye"></i>
                     </a>
                     <a class="btn btn-sm btn-info mr-1" :href="url + 'orders/'+ data.item.id">
                         <i class="ti-pencil" ></i>
                     </a>
                     <a class="btn btn-sm btn-success mr-1" :href="url + 'orders/'+ data.item.id">
                        <i class="ti-money" ></i>
                    </a>
                          
          </template>
                          </b-table>
                          {{$orders->onEachSide(1)->links()}}
                        </div>
                      </template>

        </b-col>

    </b-row>

    
</b-container>


@endsection
@section('scripts')

<script>
  var vm = new Vue({
el:'#vorders',
    data() {
      return {
        fields: [
          // A virtual column that doesn't exist in items
          { key: 'date', label: 'Date' },
          // A column that needs custom formatting
          { key: 'franchise', label: 'Franchise' },
          // A regular column
          { key: 'client', label: 'Client' },
          // A regular column
          { key: 'amount', label: 'Order Amount' },
          // A virtual column made up from two fields
          { key: 'margin', label: 'Margin' },
          { key: 'products', label: 'Products' },
          { key: 'status', label: 'Status' },
          { key: 'action', label: 'Action' }
        ],
        orders: [],
        url:'{{config("app.url")}}'
      }
    },
      methods:{
          fillOrderItems:function(){

          }
      },
      mounted:function(){
          this.$nextTick(function(){
              let orders = [];
              @php
              //foreach($_orders as $k=>$order){
            print 'vm.orders=JSON.parse(\''.$_orders.'\');';
            
//}
              @endphp
          })

      }
      });

</script>

@endsection