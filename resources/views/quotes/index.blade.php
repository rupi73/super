@extends('template')
@section('content')
<b-container class="bv-example-row" id="vorders">
    <b-row>
        <h1 class="display-5 my-3 "><b>Quotes</b></h1>
      </b-row>
      <b-row>
        <b-col cols="12">
                <template>
                        <div>
                          <b-table small :fields="fields" :items="orders" responsive="sm">
                               
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
                          {{$quotes->onEachSide(1)->links()}}
                        </div>
                      </template>

        </b-col>

    </b-row>

    
</b-container>


@endsection
@section('scripts')

<script>
    var vm = new Vue({
  el:'#vquotes',
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
           
            // A virtual column made up from two fields
       
          
         
            { key: 'action', label: 'Action' }
          ],
          quotes: [],
          url:'{{config("app.url")}}'
        }
      },
        methods:{
            fillOrderItems:function(){
  
            }
        },
        mounted:function(){
            this.$nextTick(function(){
                let quotes = [];
                @php
                //foreach($_orders as $k=>$order){
              print 'vm.quotes=JSON.parse(\''.$_quotes.'\');';
              
  //}
                @endphp
            })
  
        }
        });
  
  </script>

@endsection