@extends('template')
@section('content')
<b-container class="bv-example-row" id="vclients">
    <b-row>
        <h1 class="display-5 my-3 "><b>Clients</b></h1>
      </b-row>
      <b-row>
        <b-col cols="12">
                <template>
                        <div>
                          <b-table small :fields="fields" :items="clients" responsive="sm">

                        
                               
                            <!-- A virtual composite column -->
      <template v-slot:cell(action)="data">
        <a  :href="url + 'clients/'+ data.item.id" class="btn btn-sm mr-1 btn-dark">
                    <i class="ti-eye"></i>
                     </a>
                     <a class="btn btn-sm btn-info mr-1" :href="url + 'clients/'+ data.item.id +'/edit'">
                         <i class="ti-pencil" ></i>
                     </a>
                    
                          
          </template>
                          </b-table>
                          {{$clients->onEachSide(1)->links()}}
                        </div>
                      </template>

        </b-col>

    </b-row>

  {{$clients}}  
</b-container>


@endsection
@section('scripts')

<script>
  var vm = new Vue({
el:'#vclients',
    data() {
      return {
        fields: [
          // A virtual column that doesn't exist in items
          { key: 'name', label: 'Name' },
          // A column that needs custom formatting
          { key: 'franchise', label: 'Franchise' },
          // A regular column
          { key: 'email', label: 'Email' },
          // A regular column
          { key: 'mobile', label: 'Mobile' },
          // A virtual column made up from two fields
          { key: 'city', label: 'City' },
          { key: 'state', label: 'State' },
          { key: 'country', label: 'Country' },
          { key: 'action', label: 'Action' }
        ],
        clients: [],
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
            print 'vm.clients=JSON.parse(\''.$_clients.'\');';
            
//}
              @endphp
          })

      }

      });

</script>

@endsection