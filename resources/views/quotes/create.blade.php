@extends('template')
@section('content')
<div class="container" id="vestimate">
  <div class="row">



    <div class="col-lg-8 col-md-12">
      <div class="panel panel-white">
        <div class="panel-heading">
          <h2>ESTIMATE</h2>
        </div>
        <!--panel heading-->
        <div class="panel-body">


          <div class="row">

            <div class="col-md-6">
              <template>
                <div>
                  <b-form-select v-model="data.category.id" :options="categories" class="mb-3" value-field="id"
                    text-field="name" value="" @input="onCategorySelected">
                    <!-- This slot appears above the options from 'options' prop -->
                    <template v-slot:first>
                      <option :value="null" disabled>-- Please select Categories --</option>
                    </template>


                  </b-form-select>

                  <div class="mt-3" v-if="debug">Selected: <strong>@{{ data.category.name }}</strong></div>
                </div>
              </template>
            </div>
            <!--col-md-6-->
            <div class="col-md-6">
              <template>
                <div>
                  <b-form-select v-model="data.product.id" :options="products" class="mb-3" value-field="id"
                    text-field="name" value="" @input="onProductSelected">
                    <!-- This slot appears above the options from 'options' prop -->
                    <template v-slot:first>
                      <option :value="null" disabled>-- Please select Product --</option>
                    </template>


                  </b-form-select>

                  <div class="mt-3" v-if="debug">Selected: <strong>@{{ data.product.name }}</strong></div>
                </div>
              </template>
            </div>
            <!--col-md-6-->

          </div>
          <!--row-->



          <h2 class="mt-5">Calculator</h2>

          <div class="row">
            <div class="col">
              <template>
                <div>
                  <b-form-select v-model="data.size" :options="sizes" class="mb-3" value="" @input="onSizeSelected">
                    <!-- This slot appears above the options from 'options' prop -->
                    <template v-slot:first>
                      <option :value="null" disabled>-- Please select Size --</option>
                    </template>


                  </b-form-select>

                  <div class="mt-3" v-if="debug">Selected: <strong>@{{ size }}</strong></div>
                </div>
              </template>
            </div>
            <!--col-->

            <div class="col">
              <template>
                <div>
                  <b-form-select v-model="data.printing" :options="printingOptions" class="mb-3" value=""
                    @input="onPrintingSelected">
                    <!-- This slot appears above the options from 'options' prop -->
                    <template v-slot:first>
                      <option :value="null" disabled>-- Please select Printing --</option>
                    </template>


                  </b-form-select>

                  <div class="mt-3" v-if="debug">Selected: <strong>@{{ size }}</strong></div>
                </div>
              </template>
            </div>
            <!--col-->

            <div class="col">
              <template>
                <div>
                  <b-form-select v-model="data.paper" :options="papers" class="mb-3" value-field="id" text-field="name"
                    value="" @input="onPaperSelected">
                    <!-- This slot appears above the options from 'options' prop -->
                    <template v-slot:first>
                      <option :value="null" disabled>-- Please select Paper --</option>
                    </template>


                  </b-form-select>

                  <div class="mt-3" v-if="debug">Selected: <strong>@{{ paperId }}</strong></div>
                </div>
              </template>
            </div>
            <!--col-->


          </div>
          <!--row-->

          <!--treatments-->
          <h2 class="mt-5">Treatments</h2>
          @{{treatments}}
          <div class="row my-3">

            <div class="col col-sm-12" v-if="treatments.indexOf('foiling')!=-1">

              <h3>Foiling</h3>


              <div class="row">
                <div class="col">
                  <template>
                    <div>
                      <b-form-group label="Front Side:">
                        <b-form-checkbox-group id="checkbox-group-foiling-front" v-model="myTreatments.foiling.front"
                          :options="catJson.treatments.foiling.opts.colors" @input="myTreatmentSelected">
                        </b-form-checkbox-group>
                      </b-form-group>



                      <div>Selected: <strong>@{{ myTreatments.foiling.front }}</strong></div>
                    </div>
                  </template>
                </div>

                <div class="col">

                  <template>
                    <div>
                      <b-form-group label="Back Side:">
                        <b-form-checkbox-group id="checkbox-group-foiling-back" v-model="myTreatments.foiling.back"
                          :options="catJson.treatments.foiling.opts.colors" @input="myTreatmentSelected">
                        </b-form-checkbox-group>
                      </b-form-group>



                      <div>Selected: <strong>@{{ myTreatments.foiling.back }}</strong></div>
                    </div>
                  </template>
                </div>
              </div>
              <!--close foiling row-->

            </div>
            <!--close--col-md-4-->
            <div class="col col-sm-12" v-if="treatments.indexOf('electroplating')!=-1">

              <h3>Electroplating</h3>


              <div class="row">
                <div class="col">
                  <template>
                    <div>
                      <b-form-group label="Front Side:">
                        <b-form-checkbox-group id="checkbox-group-electroplating-front"
                          v-model="myTreatments.electroplating.front"
                          :options="catJson.treatments.electroplating.opts.colors" @input="myTreatmentSelected">
                        </b-form-checkbox-group>
                      </b-form-group>



                      <div>Selected: <strong>@{{ myTreatments.electroplating.front }}</strong></div>
                    </div>
                  </template>
                </div>

                <div class="col">

                  <template>
                    <div>
                      <b-form-group label="Back Side:">
                        <b-form-checkbox-group id="checkbox-group-electroplating-back"
                          v-model="myTreatments.electroplating.back"
                          :options="catJson.treatments.electroplating.opts.colors" @input="myTreatmentSelected">
                        </b-form-checkbox-group>
                      </b-form-group>



                      <div>Selected: <strong>@{{ myTreatments.electroplating.back }}</strong></div>
                    </div>
                  </template>
                </div>
              </div>
              <!--close electroplating row-->

            </div>
            <!--close--electroplating col-md-3-->

            <div class="col col-sm-12" v-if="treatments.indexOf('letterpress')!=-1">
              <h3>Letterpress</h3>
              <div class="row">
                <div class="col">
                  <template>
                    <div>
                      <b-form-group label="Front Side:">
                        <b-form-checkbox-group id="checkbox-group-letterpress-front"
                          v-model="myTreatments.letterpress.front" :options="catJson.treatments.letterpress.opts.colors"
                          @input="myTreatmentSelected"></b-form-checkbox-group>
                      </b-form-group>


                      <div>Selected: <strong>@{{ myTreatments.letterpress.front }}</strong></div>
                    </div>
                  </template>
                </div>

                <div class="col">

                  <template>
                    <div>
                      <b-form-group label="Back Side:">
                        <b-form-checkbox-group id="checkbox-group-letterpress-back"
                          v-model="myTreatments.letterpress.back" :options="catJson.treatments.letterpress.opts.colors"
                          @input="myTreatmentSelected"></b-form-checkbox-group>
                      </b-form-group>



                      <div>Selected: <strong>@{{ myTreatments.letterpress.back }}</strong></div>
                    </div>
                  </template>
                </div>
              </div>
              <!--close letterpress row-->

            </div>
            <!--close letterpress col-md-3-->





          </div>
          <!--first row close-->







          <div class="row my-3">

            <div class="col col-sm-12" v-if="treatments.indexOf('raised_spot_gloss')!=-1">
              <h3>Raisespot</h3>


              <template>
                <div>
                  <b-form-group>
                    <b-form-radio-group id="radio-group-raised_spot_gloss-front"
                      v-model="myTreatments.raised_spot_gloss.side"
                      :options="catJson.treatments['raised_spot_gloss'].opts" @input="myTreatmentSelected">
                      <template v-slot:first>
                        <b-form-radio value="">None</b-form-radio>
                      </template>
                    </b-form-radio-group>
                  </b-form-group>



                  <div>Selected: <strong>@{{ myTreatments.raised_spot_gloss }}</strong></div>
                </div>
              </template>

            </div>
            <!--close raisespot column-->
            <div class="col col-sm-12" v-if="treatments.indexOf('spotgloss')!=-1">
              <h3>Spotgloss</h3>


              <template>
                <div>
                  <b-form-group>
                    <b-form-radio-group id="radio-group-spotgloss-front" v-model="myTreatments.spotgloss.side"
                      :options="catJson.treatments.spotgloss.opts" @input="myTreatmentSelected">
                      <template v-slot:first>
                        <b-form-radio value="">None</b-form-radio>
                      </template>
                    </b-form-radio-group>
                  </b-form-group>



                  <div>Selected: <strong>@{{ myTreatments.spotgloss }}</strong></div>
                </div>
              </template>

            </div><!-- Spot Gloss Column-->
            <div class="col col-sm-12" v-if="treatments.indexOf('round_corners')!=-1">
              <h3>Roundcorner</h3>
              <template>
                <div>
                  <b-form-group>
                    <b-form-radio-group id="radio-group-round_corners-front" v-model="myTreatments.round_corners.side"
                      :options="catJson.treatments['round_corners'].opts" @input="myTreatmentSelected">
                      <template v-slot:first>
                        <b-form-radio value="">None</b-form-radio>
                      </template>
                    </b-form-radio-group>
                  </b-form-group>



                  <div>Selected: <strong>@{{ myTreatments.round_corners.side }}</strong></div>
                </div>
              </template>


            </div>
            <!--close roundcorner-->

            <div class="col col-sm-12" v-if="treatments.indexOf('edgepaint')!=-1">
              <h3>Edgepaint</h3>
              <template>
                <div>
                  <b-form-group>
                    <b-form-radio-group id="radio-group-edgepaint-front" v-model="myTreatments.edgepaint.color"
                      :options="catJson.treatments.edgepaint.opts" @input="myTreatmentSelected">
                      <template v-slot:first>
                        <b-form-radio value="">None</b-form-radio>
                      </template>
                    </b-form-radio-group>
                  </b-form-group>



                  <div>Selected: <strong>@{{ myTreatments.edgepaint }}</strong></div>
                </div>
              </template>
              <!--close edge paint row-->

            </div>
            <!--close edgepaint col-md-3-->
          </div>
          <!--close second row-->






          <div class="row my-3">

            <div class="col col-md-12" v-if="treatments.indexOf('laser_cut')!=-1">

              <h3>Lasercut</h3>



              <template>
                <div>
                  <b-form-group>
                    <b-form-radio-group id="radio-group-laser_cut-front" v-model="myTreatments.laser_cut.side"
                      :options="catJson.treatments['laser_cut'].opts" @input="myTreatmentSelected">
                      <template v-slot:first>
                        <b-form-radio value="">None</b-form-radio>
                      </template>
                    </b-form-radio-group>
                  </b-form-group>



                  <div>Selected: <strong>@{{ myTreatments.laser_cut }}</strong></div>
                </div>
              </template>



            </div>
            <!--close lasercut--col-md-3-->


            <div class="col-md-4" v-if="treatments.indexOf('laser_engrave')!=-1">

              <h3>Laserengrave</h3>



              <template>
                <div>
                  <b-form-group>
                    <b-form-radio-group id="radio-group-laser_engrave-front" v-model="myTreatments.laser_engrave.side"
                      :options="catJson.treatments['laser_engrave'].opts" @input="myTreatmentSelected">
                      <template v-slot:first>
                        <b-form-radio value="">None</b-form-radio>
                      </template>
                    </b-form-radio-group>
                  </b-form-group>



                  <div>Selected: <strong>@{{ myTreatments.laser_engrave }}</strong></div>
                </div>
              </template>



            </div>
            <!--close laserengrave --col-md-3-->


            <div class="col-md-4" v-if="treatments.indexOf('embossing')!=-1">

              <h3>Embossing</h3>



              <template>
                <div>
                  <b-form-group>
                    <b-form-radio-group id="radio-group-embossing-front" v-model="myTreatments.embossing.side"
                      :options="catJson.treatments.embossing.opts" @input="myTreatmentSelected">
                      <template v-slot:first>
                        <b-form-radio value="">None</b-form-radio>
                      </template>
                    </b-form-radio-group>
                  </b-form-group>



                  <div>Selected: <strong>@{{ myTreatments.embossing }}</strong></div>
                </div>
              </template>



            </div>
            <!--close embossing--col-md-3-->




          </div>
          <!--close third row-->

          <div class="row my-3">

            <div class="col col-md-12" v-if="treatments.indexOf('silk_screen')!=-1">
              <h3>Silk Screen</h3>


              <template>
                <div>
                  <b-form-group>
                    <b-form-radio-group id="radio-group-silk_screen-front" v-model="myTreatments.silk_screen.side"
                      :options="catJson.treatments['silk_screen'].opts" @input="myTreatmentSelected">
                      <template v-slot:first>
                        <b-form-radio value="">None</b-form-radio>
                      </template>
                    </b-form-radio-group>
                  </b-form-group>



                  <div>Selected: <strong>@{{ myTreatments.silk_screen }}</strong></div>
                </div>
              </template>

            </div>
            <!--close silk colom-->
          </div>
          <!--close fourth row-->






          <table class="table  mt-5">
            <thead>
              <tr>

                <th>Category</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Size</th>
                <th>Paper</th>
                <th>Treatments</th>

              </tr>
            </thead>
            <tbody>

              <tr v-for="(quote,key,index) of quotes">
                <td>@{{quote.category.name}}</td>
                <td>@{{quote.product.name}}</td>
                <td>
                  <p v-for="(qty,k,index) of quote.quantities"><b>@{{qty}}:-</b>@{{quote.prices[qty]}}</p>
                </td>
                <td>@{{quote.size}}</td>
                <td>@{{quote.paper}}</td>
                <td>
                  <p v-for="(treat,key,index) of quote.treatments"><b>@{{key}}</b></p>
                </td>

              </tr>


            </tbody>
          </table>
          <!--table close-->
          <div class="row">
            @can('super',\App\Product::class)
            <div class="col">
              <template>
                <div>
                  <b-form-select v-model="franchise_id" class="mb-3" id="input-franchise" @input="onFranchiseSelected">
                    @foreach($franchises as $franchise)
                    <optgroup label="{{$franchise->name}}">
                      @foreach($franchise->users as $user)
                      <option value="{{$user->id}}">{{$user->name}}</option>
                      @endforeach
                    </optgroup>
                    @endforeach
                  </b-form-select>

                  <div class="mt-3">Selected: <strong>@{{ client }}</strong></div>
                </div>
              </template>
            </div>
            <!--close--col-->
            @endcan
            <div class="col">
              <template>
                <div>
                  <b-form-select v-model="client" :options="clients" size="sm" class="mt-3" value-field="id"
                    text-field="name">
                    <template v-slot:first>
                      <option :value="null" disabled>-- Please Select Client --</option>
                    </template>

                  </b-form-select>

                  <div class="mt-3">Selected: <strong>@{{ client }}</strong></div>
                </div>
              </template>
            </div>
            <!--close--col-->
            <div class="col">

              <button type="button" class="btn btn-primary" :disabled="validateSaveQuote" @click="saveQuote">Save To
                Quote</button>

            </div>
            <!--close--col-->

            <div class="col ">
              <button type="button" class="btn btn-primary" :disabled="validateSaveOrder" @click="saveOrder">Add To Order</button>
            </div>
            <!--close--col-->
          </div>
          <!--row close-->

          <!--text-right-->







        </div>
        <!--panel body -->

      </div>
      <!--close close pannel-->
    </div>
    <!--close col-md-8-->
    <!--card-->
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <div class="card-header">
            <h4 class="text-center"><b>Add Product<b></h4>
          </div>
          <div class="card-content my-3">

            <table class="table">

              <thead>
                <tr>
                  <td>
                    QTY
                  </td>
                  <td>
                    PPC
                  </td>
                  <td>
                    Total
                  </td>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(qty, key, index) in quantities">
                  <td>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" :value="key" v-model="data.quantities">@{{qty}}
                      </label>
                    </div>
                  </td>
                  <td v-if="perCardPrices[qty]">
                    ₹ @{{perCardPrices[qty]}}
                  </td>

                  <td v-if="prices[qty]">
                    ₹ @{{prices[qty] }}
                  </td>

                </tr>


              </tbody>


              <table class="table">
                <tbody>
                  <tr>
                    <td>Category</td>
                    <td> @{{data.category.name}} </td>
                  </tr>

                  <tr>
                    <td>Product</td>
                    <td> @{{data.product.name}}</td>
                  </tr>

                  <tr>
                    <td>Size</td>
                    <td> @{{data.size}} </td>
                  </tr>


                  <tr>
                    <td>Printing</td>
                    <td> @{{data.printing}} </td>
                  </tr>

                  <tr>
                    <td>Paper</td>
                    <td> @{{data.paper}} </td>
                  </tr>
                  <tr>
                    <td colspan="2">Treatments</td>
                  </tr>
                  <tr v-for="(treat,key,index) of data.treatments">
                    <td>@{{key.toUpperCase()}}</td>
                    <td
                      v-if="key=='foiling' || key=='electroplating' || key=='letterpress' || key=='laser_engrave' || key=='raised_spot_gloss' || key=='silk_screen' || key=='spotgloss'">
                      <p v-for="(arr,k,index) of treat">
                        <b>@{{k.charAt(0).toUpperCase()+ k.slice(1)}}:-</b>@{{arrayToString(arr)}}</p>
                    </td>
                    <td v-if="key=='round_corners' || key=='laser_cut' || key=='embossing'">Yes</td>
                    <td v-if="key=='edgepaint'">@{{treat.color}}</td>
                  </tr>

                  <tr>
                    <td colspan="2"><button type="button" class="btn btn-primary btn-lg" :disabled="validateProduct"
                        @click="addProduct()">ADD</button> </td>
                  </tr>





                </tbody>

              </table>



          </div>

        </div>
      </div>
    </div>
    <!--close col-md-4-->
    @{{data}}
  </div>
  <!--close row-->
</div>
<!--close container-->
@endsection

@section('scripts')
<script>
  var vm = new Vue({
el:'#vestimate',
data(){
  return{
    categories:{!!$categories!!},//used in select input
    products:[],//used in categories products select input
    papers:[],//used in selected product papers
    quantities:[],//used in products quantities
    sizes:[],//used in products sizes
    debug:false,
    catJsons:{!!$catJsons!!},//Categories JSONs
    catJson:[],//selected category json
    treatments:[],//used in selected paper treatments
    printingOptions:[],//used to show printing options
    printing:{},  //product printing  
    prices:{},//product quantities prices
    perCardPrices:{},//product quantities percard prices
    data:{paper:{},treatments:{},prices:{},size:{},printing:'',category:{id:'',name:''},product:{id:'',name:''},quantities:[]},
    settings:{price:{printing:0,size:0}},
    quotes:[],
    myTreatments:{foiling:{front:[],back:[]},electroplating:{front:[],back:[]},letterpress:{front:[],back:[]},embossing:{side:''},spotgloss:{side:''},raised_spot_gloss:{side:''},round_corners:{side:''},edgepaint:{color:''},laser_cut:{side:''},laser_engrave:{side:''},silk_screen:{side:''}},
    clients:{!! $clients?$clients:'{}' !!},//used in quote saving input,
    client:'',
    franchises:{!! $franchises?$franchises:'[]' !!},
    franchise_id:'{!! $franchise_id?$franchise_id:'' !!}',
    placeOrder:false,
  resetCategorySelected:function(){
//vm.products = [];
//vm.resetProductSelected();
  },
  onCategorySelected:function(e){
      for(cat of vm.categories){
   if(cat.id==vm.data.category.id){
     vm.data.category.name = cat.name;
     vm.products = cat.products;
     break;
   }

    }
   
   vm.catJson = vm.catJsons[e];
  },//function
resetProductSelected:function(){
vm.data = {paper:{},treatments:{},prices:{},size:{},printing:'',category:{id:vm.data.category.id,name:vm.data.category.name},product:{id:'',name:''},quantities:[]};
vm.myTreatments={foiling:{front:[],back:[]},electroplating:{front:[],back:[]},letterpress:{front:[],back:[]},embossing:{side:''},spotgloss:{side:''},raised_spot_gloss:{side:''},round_corners:{side:''},edgepaint:{color:''},laser_cut:{side:''},laser_engrave:{side:''},silk_screen:{side:''}};
vm.treatments=[];
vm.settings= {price:{printing:0,size:0}};
vm.prices = {};
vm.perCardPrices={};
vm.papers=[];
vm.quantities = [];
vm.sizes = [];
  },
onProductSelected:function(e){
  console.log(vm.catJson); 
  console.log(e);
console.log(vm.catJson.products[e]);
vm.data.product.name = vm.catJson.products[e].name;
vm.sizes = vm.catJson.products[e].sizes.opts;
vm.quantities = vm.catJson.products[e].quantities.opts;
vm.data.size = vm.catJson.products[e].sizes.selected;
vm.papers = vm.catJson.products[e].papers.opts;
vm.data.paper = vm.catJson.products[e].papers.selected;
vm.data.quantities.push(vm.catJson.products[e].quantities.selected);
vm.printing = vm.catJson.products[e].printing;
vm.treatments = vm.catJson.paper[vm.data.paper].treatments;
if(vm.printing=='None'){
  vm.printingOptions=[];
}
else if(vm.printing=='Single Side'){
  vm.printingOptions={single:'Single Side'};
  vm.data.printing='single';
}
else if(vm.printing=='Both Sides'){
vm.printingOptions={both:'Both Sides'};
vm.data.printing='both';
}
else if(vm.printing=='Single And Both'){
vm.printingOptions={single:'Single Side',both:'Both Sides'};
vm.data.printing='single';
}
console.log('quantity');
console.log(vm.quantities);
vm.calcQntiesCardPrice();
  },
onPaperSelected:function(e){
console.log(vm.catJson.products[vm.data.product.id].papers);
vm.paper = vm.catJson.products[vm.data.product.id].papers.opts[e];
  }, 
calcPerCardPrice:function(qty){
vm.perCardPrices[qty] = (vm.calcQtyCardPrice(qty)/qty).toFixed(2);
  },
calcQtyCardPrice:function(qty){
let price = 0;
if(vm.settings.price.printing==0)
price = Number(vm.catJson.paper[vm.data.paper]['single'][qty]);
console.log(vm.catJson.paper[vm.data.paper]);
for(treat in vm.data.treatments){
  switch(treat){
case 'foiling':
case 'electroplating':
case 'letterpress':
let colors = vm.data.treatments[treat].front.concat(vm.data.treatments[treat].back);
for(color of colors){
  console.log(vm.catJson.treatments[treat]);
  price += Number(vm.catJson.treatments[treat][color][qty]);
}
break;
case 'round_corners':
case 'embossing':
case 'laser_cut':
case 'laser_engrave':
case 'spotgloss':
case 'raised_spot_gloss':
case 'silk_screen':
let side = vm.data.treatments[treat].side;
price += Number(vm.catJson.treatments[treat][side][qty]);
break;
case 'edgepaint':

break;
  }//switch
}
vm.prices[qty]=price;
return price;
  },
calcQntiesCardPrice:function(){
for(qty in vm.quantities){
  vm.calcQtyCardPrice(qty);
  vm.calcPerCardPrice(qty);
}
  },
myTreatmentSelected:function(e){
  console.log('wwwww');
  let price=0;
for(treat of vm.treatments){
  treat = treat.toLowerCase().replace(' ','');
  if(vm.data.treatments[treat]!=='undefined')
  delete vm.data.treatments[treat];
  vm.prices['treatments']={};
  switch(treat){
    case 'foiling':
    case 'electroplating':
    case 'letterpress':
if(vm.myTreatments[treat].front.length || vm.myTreatments[treat].back.length){
vm.data.treatments[treat]={};
vm.data.treatments[treat] = vm.myTreatments[treat];
let colors = vm.data.treatments[treat].front.concat(vm.data.treatments[treat].back);
console.log(vm.prices);
//for(color in colors){
//vm.catJson
//}

}
    break;
    case 'round_corners':
    console.log(treat);
    if(vm.myTreatments[treat].side.length){
      vm.data.treatments[treat]={};
      vm.data.treatments[treat] = vm.myTreatments[treat];
    }

    break;
    case 'edgepaint':
    if(vm.myTreatments[treat].color.length){
      vm.data.treatments[treat]={};
      vm.data.treatments[treat] = vm.myTreatments[treat];
    }
    break;
    case 'embossing':
    if(vm.myTreatments[treat].side.length){
      vm.data.treatments[treat]={};
      vm.data.treatments[treat] = vm.myTreatments[treat];
    }
    break;
    case 'raisespotgloss':
    if(vm.myTreatments[treat].side.length){
      vm.data.treatments[treat]={};
      vm.data.treatments[treat] = vm.myTreatments[treat];
    }
    break;
    case 'spotgloss':
    if(vm.myTreatments[treat].side.length){
      vm.data.treatments[treat]={};
      vm.data.treatments[treat] = vm.myTreatments[treat];
    }
    break;
    case 'silk_screen':
    if(vm.myTreatments[treat].side.length){
      vm.data.treatments[treat]={};
      vm.data.treatments[treat] = vm.myTreatments[treat];
    }
    break;
    case 'laser_cut':
    if(vm.myTreatments[treat].side.length){
      vm.data.treatments[treat]={};
      vm.data.treatments[treat] = vm.myTreatments[treat];
    }
    break;
    case 'laser_engrave':
    if(vm.myTreatments[treat].side.length){
      vm.data.treatments[treat]={};
      vm.data.treatments[treat] = vm.myTreatments[treat];
    }
    break;

  }
}
vm.calcQntiesCardPrice();
},//function
arrayToString:function(arr){
  if(!Array.isArray(arr))
  return arr;
 return arr.join();
},
addProduct:function(){
  vm.data.prices=vm.prices;
  vm.quotes.push(vm.data);
  vm.canPlaceOrder();
  vm.resetProductSelected();
},
onFranchiseSelected:function(e){
console.log('franchisee');
console.log(e);
for(franchise of vm.franchises){
  for(user of franchise.users){
   if(user.id==vm.franchise_id){
     vm.clients = user.clients;
     break;
   }
  }
}
},
saveQuote:function(){
  let data = {
    client_id:vm.client,
    franchise_id:vm.franchise_id,
    estimate:vm.quotes
  
  }
console.log('save quotes');
console.log(data);
const apiServer = "{{route('quotes.store')}}";
      console.log(apiServer);
      axios.post(`${apiServer}`, data).then((res)=>{
        if(res.data.success){
         vm.resetProductSelected();
         window.location.href='{{route("quotes.index")}}';
        }
        
      });

},
saveOrder:function(){
  let data = {
    client_id:vm.client,
    franchise_id:vm.franchise_id,
    estimate:vm.quotes
  
  }
console.log('save order');
console.log(data);
const apiServer = "{{route('orders.qstore')}}";
      console.log(apiServer);
      axios.post(`${apiServer}`, data).then((res)=>{
        if(res.data.success){
         resetProductSelected();
        }
        console.log(res);
      });
},
canPlaceOrder:function(){
  let placeOrder=true;
  for(quote of vm.quotes){
    if(quote.quantities.length>1){
    placeOrder=false; 
break;
    }   
  }
  vm.placeOrder = placeOrder;
}//function
}//return
},//data
computed:{
validateProduct:function(){
  return this.data.quantities.length === 0;

},
validateSaveQuote:function(){
  return !(this.quotes.length && this.client!=='');

},
validateSaveOrder:function(){
  return !(this.placeOrder && this.client!=='');

}
},
mounted: function () {
  this.$nextTick(function () {
    
    vm.resetCategorySelected();


  })
}
});
</script>
@endsection