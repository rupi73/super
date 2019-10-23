@extends('template')
@section('title','Add Paper Prices')
@section('content')
<div class="container" id="vapp">
    <h2>Papers Prices</h2><br>

    <div class="row mt-5">
                      <div class="col-md-4">
                          <div>                       
                              <vue-bootstrap-typeahead
                                class="mb-4"
                                v-model="cquery"
                                :data="categories"
                                :serializer="item => item.name"
                                @hit="onCategorySelected"
                                placeholder="Select Category"
                              />
                            
                             <h3>Selected Category JSON</h3>
                             <pre>@{{ category | stringify }}</pre>
                            </div>    
                              


                    </div><!--col-md-4-->
                
                    <div class="col-md-4" v-if="category.name">
   
                      <div>                       
                          <vue-bootstrap-typeahead
                            class="mb-4"
                            v-model="pquery"
                            :data="papers"
                            :serializer="item => item.name"
                            @hit="onPaperSelected"
                            placeholder="Select Paper"
                          />
                        
                         <h3>Selected Paper JSON</h3>
                         <pre>@{{ paper | stringify }}</pre>
                        </div>
                  </div>
                


          

 
      </div><!--row-->
      <div class="row" >
        
           
          <b-form-group label="Select Paper Treatments:">
            <b-form-checkbox-group id="checkbox-group-category" v-model="settings.treatments" name="treatments[]">
                @foreach($treatments as $treatment)
              <b-form-checkbox value="{{$treatment->id}}">{{$treatment->name}}</b-form-checkbox>
              @endforeach
            </b-form-checkbox-group>
        </b-form-group>
         
      </div><!--row-->
      <div class="clear"></div>
        <b-container class="bv-example-row" v-for="size in category.sizes" v-if="category.is_size_price && paper.name">
            <h4>@{{size.label}}</h4>
            <h6>Single Side</h6>
          <b-row >             
              
            <b-col md="1" v-for="quantity in category.quantities">
              @{{createSizeDynamicModel('single',size['value'],quantity['value'])}}
            <input type="text"  class="form-control" v-model="qp.single[size['value']][quantity['value']]">
            <small>@{{quantity.label}}</small></b-col>
            
          </b-row>
          <h6>Both Sides</h6>
          <b-row >          
              
            <b-col md="1" v-for="quantity in category.quantities">
                @{{createSizeDynamicModel('both',size['value'],quantity['value'])}}
              <input type="text" class="form-control" v-model="qp.both[size['value']][quantity['value']]">
              <small>@{{quantity.label}}</small></b-col>
            
          </b-row>
        </b-container>
        <b-container class="bv-example-row" v-if="!category.is_size_price && paper.name">
            <h6>Single Side</h6>
            <b-row >
            <b-col md="1" v-for="quantity in category.quantities">
                @{{createDynamicModel('single',quantity['value'])}}
                <input type="text" class="form-control" v-model="qp.single[quantity['value']]">
                <small>@{{quantity.label}}</small></b-col>
            </b-row> 
            <h6>Both Sides</h6>
            <b-row >
            <b-col md="1" v-for="quantity in category.quantities">
                @{{createDynamicModel('both',quantity['value'])}}
                <input type="text" class="form-control" v-model="qp.both[quantity['value']]">
                <small>@{{quantity.label}}</small></b-col>
            </b-row>   
          </b-container>
          <button v-on:click="showQpValues" v-show="false">Show Values</button>
          <button v-on:click="saveQpValues" v-show="paper.name">Save Prices</button>
</div>

@endsection
@section('scripts12')
<script>
    const template = `
<div>
  <vue-bootstrap-typeahead
    v-model="query"
    :data="countries"
    placeholder="Enter a country"
  />
  <p class="lead">
    Selected Country: <strong>@{{query}}</strong>
  </p>
</div>
`

new Vue({
  template,
  components: {
    VueBootstrapTypeahead
  },
  data() {
    return {
      query: '',
      countries: [
        'Canada',
        'United States',
        'Mexico'
      ]
    }
  }
}).$mount('#vapp')
    </script>
@endsection

@section('scripts13')
<script>
  var vapp = new Vue({
      el:'#vapp',
      components: {
    VueBootstrapTypeahead
  },
  data:{
    qpaper: '',
    qcategory:'',
    papers: [
        'Matt Finish',
        'Soft Suede',
        'Pearl Finish'
      ],
    categories:[
        'Business Cards',
        'Wedding Cards',
        'Leaflets'
      ]
  },
  methods:{

  }

  }); 
</script>
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
      pquery: '',
      paper: {},
      papers: [],
      cquery:'',
      category:{quantities:{},sizes:{}},
      categories:[],
      quantities:[],
      sizes:[],
      qp:{single:{},both:{}},
      settings:{treatments:[]},
      resetData:function(){
        vm.pquery='';
        vm.papers = [];       
        vm.paper={};
        vm.qp={single:{},both:{}};
        vm.settings={treatments:[]};
      },
      onCategorySelected:function($event){
        vm.category = $event;
        vm.resetData();        
        console.log(vm.category);

      },
      onPaperSelected:function($event){
        vm.resetData();
        vm.paper = $event;
        if(vm.paper.paper_prices.length){
          vm.qp = JSON.parse(vm.paper.paper_prices[0].quantity_prices);
          vm.settings = JSON.parse(vm.paper.paper_prices[0].settings);
          }
          
      },
      createSizeDynamicModel:function(side,size,qty){
        if(typeof this.qp[side]==='undefined')
        this.qp[side]={};
        if(typeof this.qp[side][size]==='undefined')
        this.qp[side][size]={};
        if(typeof this.qp[side][size][qty]==='undefined')         
          this.qp[side][size][qty]=0;
     

        

      },
      createDynamicModel:function(side,qty){
        if(typeof this.qp[side]==='undefined')
        this.qp[side]={};
        if(typeof this.qp[side][qty]==='undefined')
        this.qp[side][qty]=0;

      },
      showQpValues:function(){
        console.log(vm.qp);
      },
      saveQpValues:function(){
        const apiServer = "{{url('/japi/save_paper_prices')}}";
      console.log(apiServer);
      axios.post(`${apiServer}`, {category:vm.category.id,paper:vm.paper.id,qp:vm.qp,settings:vm.settings}).then((res)=>{
        if(res.data.success){
          vm.paper = {};
          vm.qp={};
          vm.settings={treatments:[]};
          vm.pquery='';
        }
        console.log(res);
      });

      }
    }
  },
  watch: {
    // When the query value changes, fetch new results from
    // the API - in practice this action should be debounced
    pquery(newQuery) {
      const apiServer ="{{url('/japi/papers/')}}";
      console.log(apiServer);
      axios.get(`${apiServer}?cat=${this.category.id}&& q=${newQuery}`)
        .then((res) => {
          //console.log(res)
          this.papers = res.data;
        })
    },
    cquery(newQuery) {
      const apiServer = "{{url('/japi/categories/')}}";
      console.log(apiServer);
      axios.get(`${apiServer}?q=${newQuery}`)
        .then((res) => {
          //console.log(res)
          this.categories = res.data;
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