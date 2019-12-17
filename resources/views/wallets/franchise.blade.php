@extends('template')
@section('content')
<b-container class="bv-example-row" id="vwallets">
    <b-row>
        <h1 class="display-5 m-3 d-inline-block"><b>Wallet</b></h1>
        <h6 class=" m-3 d-inline-block border border-dark p-3"> ₹ {{$balance}}</h6>
      </b-row>
      <b-row>
        <b-col cols="12">
                <template>
                        <div>
                          <b-table small :fields="fields" :items="transactions" responsive="sm">
                            <template v-slot:cell(amount)="data">
     
                              ₹ @{{data.item.amount}}
                            </template>   
                            <!-- A virtual composite column -->
      <template v-slot:cell(action)="data">
     
                          
          </template>
                          </b-table>
                      
                        </div>
                      </template>

        </b-col>

    </b-row>

    
</b-container>


@endsection
@section('scripts')

<script>
  var vm = new Vue({
el:'#vwallets',
    data() {
      return {
        fields: [
          // A virtual column that doesn't exist in items
          { key: 'date', label: 'Date' },
          // A column that needs custom formatting
          { key: 'amount', label: 'Amount' },
          // A regular column
          { key: 'type', label: 'Type' },
          // A regular column
          { key: 'detail', label: 'Detail' },
          // A virtual column made up from two fields
        
          { key: 'action', label: 'Action' }
        ],
        transactions: [],
        url:'{{config("app.url")}}'
      }
    },
      methods:{
          fillOrderItems:function(){

          }
      },
      mounted:function(){
          this.$nextTick(function(){
               @php
              //foreach($_orders as $k=>$order){
            print 'vm.transactions=JSON.parse(\''.$transactions.'\');';
            
//}
              @endphp
          })

      }
      });

</script>

@endsection