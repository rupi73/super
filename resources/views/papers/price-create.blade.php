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
                

                <div class="col-md-4">
                      
                    <div class="form-group">
                        <select class="form-control" id="sel1">
                          <option>Quantities</option>
                          <option v-for="quantity in category.quantities">@{{ quantity.label }}</option>
                        </select>
                      </div> 


                </div><!--col-md-4-->

                <div class="col-md-4">
                    <div class="form-group">
                        <select class="form-control" id="sel1">
                          <option>Sizes</option>
                          <option v-for="size in category.sizes">@{{ size.label }}</option>
                        </select>
                      </div> 
                        


              </div><!--col-md-4-->
          

 
      </div><!--row-->
      <div class="row" v-if="category.name">
        <div class="col-md-4">
   
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
      onCategorySelected:function($event){
        console.log(vm.category);
        vm.category = $event;

      },
      onPaperSelected:function($event){
        console.log(vm.paper);
        vm.paper = $event;
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
          if(this.paper.paper_prices.length){
          this.qp = JSON.parse(this.paper.paper_prices[0].quantity_prices);
          }
          else
        this.qp[side][qty]=0;

        }

        

      },
      showQpValues:function(){
        console.log(vm.qp);
      },
      saveQpValues:function(){
        const apiServer = '{{env('App_URL')."japi/save_paper_prices"}}';
      console.log(apiServer);
      axios.post(`${apiServer}`, {category:vm.category.id,paper:vm.paper.id,qp:vm.qp}).then((res)=>{
        if(res.data.success){
          vm.paper = {};
          vm.qp={};
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
      const apiServer = '{{env('App_URL')."japi/papers"}}';
      console.log(apiServer);
      axios.get(`${apiServer}?cat=${this.category.id}&& q=${newQuery}`)
        .then((res) => {
          //console.log(res)
          this.papers = res.data;
        })
    },
    cquery(newQuery) {
      const apiServer = '{{env('App_URL')."japi/categories"}}';
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