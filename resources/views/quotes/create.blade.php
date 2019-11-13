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
                  <b-form-select v-model="data.product.id" :options="products" class="mb-3" value-field="id" text-field="name"
                    value="" @input="onProductSelected">
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
                  <b-form-select v-model="data.printing" :options="printingOptions" class="mb-3" value="" @input="onPrintingSelected">
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

            <div class="col col-sm-12" v-if="treatments.indexOf('Foiling')!=-1">

              <h3>Foiling</h3>


              <div class="row">
                <div class="col">
                  <template>
                    <div>
                      <b-form-group label="Front Side:">
                        <b-form-checkbox-group id="checkbox-group-foiling-front" v-model="myTreatments.foiling.front"
                          :options="catJson.treatments.Foiling.opts.colors" @input="myTreatmentSelected"></b-form-checkbox-group>
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
                          :options="catJson.treatments.Foiling.opts.colors" @input="myTreatmentSelected"></b-form-checkbox-group>
                      </b-form-group>



                      <div>Selected: <strong>@{{ myTreatments.foiling.back }}</strong></div>
                    </div>
                  </template>
                </div>
              </div>
              <!--close foiling row-->

            </div>
            <!--close--col-md-4-->
            <div class="col col-sm-12" v-if="treatments.indexOf('Electroplating')!=-1">

              <h3>Electroplating</h3>


              <div class="row">
                <div class="col">
                  <template>
                    <div>
                      <b-form-group label="Front Side:">
                        <b-form-checkbox-group id="checkbox-group-electroplating-front" v-model="myTreatments.electroplating.front"
                          :options="catJson.treatments.Electroplating.opts.colors" @input="myTreatmentSelected"></b-form-checkbox-group>
                      </b-form-group>



                      <div>Selected: <strong>@{{ myTreatments.electroplating.front }}</strong></div>
                    </div>
                  </template>
                </div>

                <div class="col">

                  <template>
                    <div>
                      <b-form-group label="Back Side:">
                        <b-form-checkbox-group id="checkbox-group-electroplating-back" v-model="myTreatments.electroplating.back"
                          :options="catJson.treatments.Electroplating.opts.colors" @input="myTreatmentSelected"></b-form-checkbox-group>
                      </b-form-group>



                      <div>Selected: <strong>@{{ myTreatments.electroplating.back }}</strong></div>
                    </div>
                  </template>
                </div>
              </div>
              <!--close electroplating row-->

            </div>
            <!--close--electroplating col-md-3-->
            
            <div class="col col-sm-12" v-if="treatments.indexOf('LETTERPRESS')!=-1">
              <h3>Letterpress</h3>
              <div class="row">
                <div class="col">
                  <template>
                    <div>
                      <b-form-group label="Front Side:">
                        <b-form-checkbox-group id="checkbox-group-letterpress-front" v-model="myTreatments.letterpress.front"
                          :options="catJson.treatments.LETTERPRESS.opts.colors" @input="myTreatmentSelected"></b-form-checkbox-group>
                      </b-form-group>


                      <div>Selected: <strong>@{{ myTreatments.letterpress.front }}</strong></div>
                    </div>
                  </template>
                </div>

                <div class="col">

                  <template>
                    <div>
                      <b-form-group label="Back Side:">
                        <b-form-checkbox-group id="checkbox-group-letterpress-back" v-model="myTreatments.letterpress.back"
                          :options="catJson.treatments.LETTERPRESS.opts.colors" @input="myTreatmentSelected"></b-form-checkbox-group>
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

            <div class="col col-sm-12" v-if="treatments.indexOf('RAISED SPOT GLOSS')!=-1">
              <h3>Raisespot</h3>


              <template>
                <div>
                  <b-form-group>
                    <b-form-radio-group id="radio-group-raisedspotgloss-front" v-model="myTreatments.raisedspotgloss"
                      :options="catJson.treatments['RAISED SPOT GLOSS'].opts" @input="myTreatmentSelected">
                      <template v-slot:first>
                        <b-form-radio value="">None</b-form-radio>
                      </template>
                    </b-form-radio-group>
                  </b-form-group>



                  <div>Selected: <strong>@{{ myTreatments.raisedspotgloss }}</strong></div>
                </div>
              </template>

            </div>
            <!--close raisespot column-->
            <div class="col col-sm-12" v-if="treatments.indexOf('SPOTGLOSS')!=-1">
              <h3>Spotgloss</h3>


              <template>
                <div>
                  <b-form-group>
                    <b-form-radio-group id="radio-group-spotgloss-front" v-model="myTreatments.spotgloss"
                      :options="catJson.treatments.SPOTGLOSS.opts" @input="myTreatmentSelected">
                      <template v-slot:first>
                        <b-form-radio value="">None</b-form-radio>
                      </template>
                    </b-form-radio-group>
                  </b-form-group>



                  <div>Selected: <strong>@{{ myTreatments.spotgloss }}</strong></div>
                </div>
              </template>

            </div><!-- Spot Gloss Column-->
            <div class="col col-sm-12" v-if="treatments.indexOf('ROUND CORNERS')!=-1">
              <h3>Roundcorner</h3>
              <template>
                <div>
                  <b-form-group>
                    <b-form-radio-group id="radio-group-roundcorner-front" v-model="myTreatments.roundcorners.side"
                      :options="catJson.treatments['ROUND CORNERS'].opts" @input="myTreatmentSelected">
                      <template v-slot:first>
                        <b-form-radio value="">None</b-form-radio>
                      </template>
                    </b-form-radio-group>
                  </b-form-group>



                  <div>Selected: <strong>@{{ myTreatments.roundcorners.side }}</strong></div>
                </div>
              </template>


            </div>
            <!--close roundcorner-->

            <div class="col col-sm-12" v-if="treatments.indexOf('EDGEPAINT')!=-1">
              <h3>Edgepaint</h3>
              <template>
                <div>
                  <b-form-group>
                    <b-form-radio-group id="radio-group-edgepaint-front" v-model="myTreatments.edgepaint.color"
                      :options="catJson.treatments.EDGEPAINT.opts" @input="myTreatmentSelected">
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

            <div class="col col-md-12" v-if="treatments.indexOf('LASER CUT')!=-1">

              <h3>Lasercut</h3>



              <template>
                <div>
                  <b-form-group>
                    <b-form-radio-group id="radio-group-roundcorner-front" v-model="myTreatments.lasercut.side"
                      :options="catJson.treatments['LASER CUT'].opts" @input="myTreatmentSelected">
                      <template v-slot:first>
                        <b-form-radio value="">None</b-form-radio>
                      </template>
                    </b-form-radio-group>
                  </b-form-group>



                  <div>Selected: <strong>@{{ myTreatments.lasercut }}</strong></div>
                </div>
              </template>



            </div>
            <!--close lasercut--col-md-3-->


            <div class="col-md-4" v-if="treatments.indexOf('LASER ENGRAVE')!=-1">

              <h3>Laserengrave</h3>



              <template>
                <div>
                  <b-form-group>
                    <b-form-radio-group id="radio-group-laserengrave-front" v-model="myTreatments.laserengrave.side"
                      :options="catJson.treatments['LASER ENGRAVE'].opts" @input="myTreatmentSelected">
                      <template v-slot:first>
                        <b-form-radio value="">None</b-form-radio>
                      </template>
                    </b-form-radio-group>
                  </b-form-group>



                  <div>Selected: <strong>@{{ myTreatments.laserengrave }}</strong></div>
                </div>
              </template>



            </div>
            <!--close laserengrave --col-md-3-->


            <div class="col-md-4" v-if="treatments.indexOf('EMBOSSING')!=-1">

              <h3>Embossing</h3>



              <template>
                <div>
                  <b-form-group>
                    <b-form-radio-group id="radio-group-embossing-front" v-model="myTreatments.embossing.side"
                      :options="catJson.treatments.EMBOSSING.opts" @input="myTreatmentSelected">
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

            <div class="col col-md-12" v-if="treatments.indexOf('SILK SCREEN')!=-1">
              <h3>Silk Screen</h3>


              <template>
                <div>
                  <b-form-group>
                    <b-form-radio-group id="radio-group-silkscreen-front" v-model="myTreatments.silkscreen.side"
                      :options="catJson.treatments['SILK SCREEN'].opts" @input="myTreatmentSelected">
                      <template v-slot:first>
                        <b-form-radio value="">None</b-form-radio>
                      </template>
                    </b-form-radio-group>
                  </b-form-group>



                  <div>Selected: <strong>@{{ myTreatments.silkscreen }}</strong></div>
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

              <tr>
                <td>Matt finish</td>
                <td>Business card</td>
                <td>5</td>
                <td>12mm</td>
                <td>Foiling</td>
                <td>NUll</td>

              </tr>


            </tbody>
          </table>
          <!--table close-->

          <div class="text-right">
            <button type="button" class="btn btn-primary">Save To Quote</button>

            <button type="button" class="btn btn-primary">Add To Order</button>
          </div>
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
                      <input type="checkbox" class="form-check-input" :value="key">@{{qty}}
                      </label>
                    </div>
                  </td>
                  <td>
                    ₹ @{{calcPerCardPrice(qty)}}
                  </td>

                  <td>
                    ₹ @{{calcQtyCardPrice(qty)}}
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
                  <td>@{{key}}</td>
                  <td> <p v-for="(arr,k,index) of treat"><b>@{{k}}:-</b>@{{arrayToString(arr)}}</p> </td>
                  </tr>

                  <tr>
                    <td colspan="2"><button type="button" class="btn btn-primary btn-lg">ADD</button> </td>
                  </tr>





                </tbody>

              </table>



          </div>

        </div>
      </div>
    </div>
    <!--close col-md-4-->

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
    categories:{!!$categories!!},
    products:[],
    papers:[],
    quantities:[],
    sizes:[],
    debug:false,
    catJsons:{!!$catJsons!!},
    catJson:[],
    treatments:[],
    printingOptions:[],
    printing:{},    
    prices:{},
    data:{paper:{},treatments:{},quantity:{},size:{},printing:'',category:{id:'',name:''},product:{id:'',name:''}},
    settings:{price:{printing:0,size:0}},
    myTreatments:{foiling:{front:[],back:[]},electroplating:{front:[],back:[]},letterpress:{front:[],back:[]},embossing:{side:''},spotgloss:{side:''},raisedSpotgloss:{side:''},roundcorners:{side:''},edgepaint:{color:''},lasercut:{side:''},laserengrave:{side:''},silkscreen:{side:''}},
    onCategorySelected:function(e){
      for(cat of vm.categories){
   if(cat.id==vm.data.category.id){
     vm.data.category.name = cat.name;
     vm.products = cat.products;
   }
   vm.papers=[];
   vm.quantities = [];
   vm.sizes = [];
   vm.catJson = vm.catJsons[e];
    }
  },//function
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
vm.printing = vm.catJson.products[e].printing;
vm.treatments = vm.catJson.paper[vm.data.paper].treatments;
if(vm.printing=='None'){
  vm.printingOptions=[];
}
else if(vm.printing=='Single Side'){
  vm.printingOptions={single:'Single Side'};
  vm.data.printing='single';
}
else if(vm.printing=='Both Sides')
vm.printingOptions={both:'Both Sides'};
else if(vm.printing=='Single and Both')
vm.printingOptions={single:'Single Side',both:'Both Sides'};
console.log('quantity');
console.log(vm.quantities);
  },
onPaperSelected:function(e){
console.log(vm.catJson.products[vm.data.product.id].papers);
vm.paper = vm.catJson.products[vm.data.product.id].papers.opts[e];
  }, 
calcPerCardPrice:function(qty){
return (vm.calcQtyCardPrice(qty)/qty).toFixed(2);
  },
calcQtyCardPrice:function(qty){
let price = 0;
if(vm.settings.price.printing==0)
price = vm.catJson.paper[vm.data.paper]['single'][qty];
console.log(vm.catJson.paper[vm.data.paper]);
vm.prices[qty]=price;
return price;
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
vm.prices['treatments'][treat]=0;
let colors = vm.data.treatments[treat].front.concat(vm.data.treatments[treat].back);
//for(color in colors){
//vm.catJson
//}

}
    break;
    case 'roundcorners':
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
    case 'silkscreen':
    if(vm.myTreatments[treat].side.length){
      vm.data.treatments[treat]={};
      vm.data.treatments[treat] = vm.myTreatments[treat];
    }
    break;
    case 'lasercut':
    if(vm.myTreatments[treat].side.length){
      vm.data.treatments[treat]={};
      vm.data.treatments[treat] = vm.myTreatments[treat];
    }
    break;
    case 'laserengrave':
    if(vm.myTreatments[treat].side.length){
      vm.data.treatments[treat]={};
      vm.data.treatments[treat] = vm.myTreatments[treat];
    }
    break;

  }
}
for(treat in vm.data.treatments){
  console.log('loop'+treat);
}
console.log(vm.data.treatments);
},//function
arrayToString:function(arr){
  if(!Array.isArray(arr))
  return arr;
 return arr.join();
}
}//return
}//data
});
</script>
@endsection