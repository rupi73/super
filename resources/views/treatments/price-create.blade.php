@extends('template')
@section('title','Add Treatment Prices')
@section('content')
<div class="container" id="vapp">
    <h2>Treatment Prices</h2><br>

    <div class="row mt-5">
                      <div class="col-md-4" v-if="checkedCategory">
                          <div>                       
                            <vue-bootstrap-typeahead
                                class="mb-4"
                                v-model="tquery"
                                :data="treatments"
                                :serializer="item => item.name"
                                @hit="onTreatmentSelected"
                                placeholder="Select Treatment"
                              />
                            
                             <h3>Selected Treatment JSON</h3>
                             <pre>@{{ treatment | stringify }}</pre>
                          </div>    
                              


                    </div><!--col-md-4-->
                

                <div class="col-md-8">
                          <div class="row">
                            <b-form-group label="Select Categories to Add Price:">
                                <b-form-radio-group id="checkbox-group-category" v-model="checkedCategory" name="categories[]">
                                    @foreach($categories as $category)
                                  <b-form-radio value="{{$category->id}}">{{$category->name}}</b-form-radio>
                                  @endforeach
                                </b-form-radio-group>
                            </b-form-group>
                        </div>
                </div><!--col-md-8-->


          
      </div><!--row-->
      <template v-if="treatment.name && checkedCategory && quantities.length && colors.length">
          <b-container class="bv-example-row" v-for="color in colors">
              <h4>@{{color}}</h4>
              <b-row >             
                
              <b-col md="1" v-for="quantity in quantities">
                  @{{createDynamicModel(color,quantity['value'])}}
                  <input type="text"  class="form-control" v-model="qp[color][quantity['value']]">
              <small>@{{quantity.label}}</small></b-col>
              
            </b-row>
           </b-container>
    </template>
    <template v-if="treatment.name && checkedCategory && quantities.length && !colors.length">
        <b-container class="bv-example-row" v-for="color in colors">
            <h4>Single Side</h4>
            <b-row >             
              
            <b-col md="1" v-for="quantity in quantities">
                @{{createDynamicModel(color,quantity['value'])}}
                <input type="text"  class="form-control" v-model="qp.single[quantity['value']]">
            <small>@{{quantity.label}}</small></b-col>
            
          </b-row>
          <h6>Both Sides</h6>
          <b-row>              
            <b-col md="1" v-for="quantity in quantities">
                @{{createDynamicModel('both',quantity['value'])}}
              <input type="text" class="form-control" v-model="qp.both[quantity['value']]">
              <small>@{{quantity.label}}</small></b-col>            
          </b-row>
         </b-container>
        
  </template>
  <button v-on:click="saveQpValues" v-show="treatment.name">Save Prices</button>
</div><!--container-->

@endsection

@section('scripts')
<script>
  
var vm = new Vue({
  el:'#vapp',
  components: {
    VueBootstrapTypeahead
  },
  data() {
    return {
      tquery: '',
      treatment: {},
      treatments: [],
      qquery:'',
      quantity:{},
      quantities:[],      
      qp:{single:{},both:{}},
      checkedCategory:'',
      setting:{},
      colors:[],
      onTreatmentSelected:function($event){
        vm.treatment = $event;
        console.log(vm.treatment);
        vm.setting = JSON.parse(vm.treatment.settings);
        vm.colors = typeof vm.setting.colors !== 'undefined'?vm.setting.colors.split(','):[];
        console.log(vm.setting);
      },
      checkCategory:function($event){
        let ele = $event.target;
        if(ele.checked)
        console.log('true'+ele.value);
        else
        console.log('false'+ele.value);
        console.log($event.target);
      console.log(this.checkedCategories_);
      },
      onQuantitySelected:function($event){
        console.log(vm.quantity);
        vm.quantity = $event;
      },
      createSizeDynamicModel:function(side,size,qty){
        if(typeof this.qp[side]==='undefined')
        this.qp[side]={};
        if(typeof this.qp[side][size]==='undefined')
        this.qp[side][size]={};
        if(typeof this.qp[side][size][qty]==='undefined'){
          if(this.paper.paper_prices.length)
          console.log('paper prices');
        this.qp[side][size][qty]=0;

        }

        

      },
      createDynamicModel:function(side,qty){
        if(typeof this.qp[side]==='undefined')
        this.qp[side]={};
        if(typeof this.qp[side][qty]==='undefined'){
          if(this.treatment.treatment_prices.length){
          this.qp = JSON.parse(this.treatment.treatment_prices[0].quantity_prices);
          }
          else
        this.qp[side][qty]=0;

        }

        

      },
      showQpValues:function(){
        console.log(vm.qp);
      },
      saveQpValues:function(){
        const apiServer = "{{url('/japi/save_treatment_prices')}}";
      console.log(apiServer);
      axios.post(`${apiServer}`, {category:vm.checkedCategory,treatment:vm.treatment.id,qp:vm.qp}).then((res)=>{
        if(res.data.success){
          vm.treatment = {};
          vm.qp={};
          vm.tquery='';
        }
        console.log(res);
      });

      }
    }
  },
  watch: {
    // When the query value changes, fetch new results from
    // the API - in practice this action should be debounced
    tquery(newQuery) {
      const apiServer ="{{url('/japi/treatments/')}}";
      console.log(apiServer);
      axios.get(`${apiServer}?q=${newQuery}&&cat=${this.checkedCategory}`)
        .then((res) => {
          //console.log(res)
          this.treatments = res.data;
        })
    },
    checkedCategory(newQuery) {
      const apiServer = "{{url('/japi/cat-qnty/')}}";
      console.log(apiServer);
      axios.get(`${apiServer}?cat=${this.checkedCategory}`)
        .then((res) => {
          //console.log(res)
          this.quantities = res.data;
          console.log(this.quantities);
        })
    },
   /* category(selected){
      console.log(selected);
      const apiServer = '{{env('App_URL')."japi/categories/sizes-qnty"}}';
      console.log(apiServer);
      axios.get(`${apiServer}?q=${selected['id']}`)
        .then((res) => {
          //console.log(res)
          this.quantities = res.data.quantities;
          this.sizes = res.data.sizes
        })
      console.log('You Have Selected Category');
      console.log(this.category);
    }*/
  },
  filters: {
    stringify(value) {
      return JSON.stringify(value, null, 2)
    }
  },
})
</script>
@endsection