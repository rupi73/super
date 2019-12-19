@extends('template')
@section('content')
<b-container class="bv-example-row" id="vestimate">
  <b-row>
    <h1 class="display-5 my-3 "><b>Estimate</b></h1>
  </b-row>
  <b-row>
    <b-col cols="3">
      <b-card border-variant="dark" header="Product Attributes" align="center" class="h-100 d-inline-block">
        <h6 class="my-3 ">choose paper size and printing</h6>
        <b-row>
          <b-col cols="12" align-self="center">
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
          </b-col>
        </b-row>
        <b-row>
          <b-col cols="12" align-self="center">
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
          </b-col>
        </b-row>
        <b-row>
          <b-col cols="12" align-self="center">
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

          </b-col>
        </b-row>
        <b-row>
          <b-col cols="12" align-self="center">
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
          </b-col>

        </b-row>
        <b-row>
          <b-col cols="12" align-self="center">
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

          </b-col>
        </b-row>
        
      </b-card>
    </b-col>

    <b-col cols="4">
      <b-card border-variant="dark" header="Product Description" align="left" class="h-100 d-inline-block">
          <b-row>
          <template>
            <div class="table-responsive" style="max-height:200px;">
              <table class="table table-sm table-bordered table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Qty</th>
                    <th scope="col">TPPC</th>
                    <th scope="col">PPC</th>
                    <th scope="col">TP</th>
                    <th scope="col">Total</th>

                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(qty, key, index) in quantities"
                    :class="{ 'table-active': data.quantities.indexOf(qty)!==-1 }">
                    <td>
                      <template v-if="orderPage">
                        <input type="radio" :value="key" v-model="data.quantities">
                      </template>
                      <template v-else>
                        <input type="checkbox" :value="key" v-model="data.quantities">
                      </template>
                    </td>
                    <td>@{{qty}}</td>
                    <td>₹@{{mperCardPrices[qty]}}</td>
                    <td>₹@{{perCardPrices[qty]}}</td>
                    <td>₹@{{mprices[qty] }}</td>
                    <td>₹@{{prices[qty] }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </template>
        </b-row>

          <h6 class="my-1">choose treatments</h6>
          <b-row>
            <b-col cols="12" align-self="center">
              <template>
                <treeselect :multiple="true" :options="treeTreatments" :always-open="false" :disable-branch-nodes="true"
                  :default-expand-level="1" :searchable="false" :flat="true" :open-direction="bottom"
                  placeholder="Choose Treatments..." max-height=150 allow-clearing-disabled="true"
                  v-model="treeTreatmentValues" @select="selectTreatment" @deselect="deSelectTreatment">

                  <div slot="value-label" slot-scope="{ node }">@{{ node.id }}</div>
                </treeselect>

              </template>

            </b-col>
          </b-row>
          <b-row class="mt-4">
            <b-col cols="12" align-self="center">
              <template>
                <div>
                  <b-form-select v-model="addOns" :options="addOnProducts" class="mt-3" value-field="id"
                    text-field="name" @input="onAddOnProductSelected" multiple v-if="!disableProduct" :select-size="4">
                    <!-- This slot appears above the options from 'options' prop -->
                    <template v-slot:first>
                      <option :value="null">-- add on products --</option>
                    </template>


                  </b-form-select>

                </div>
              </template>
            </b-col>
          </b-row>
<b-row class="justify-content-center">
          <b-button :disabled="disableProduct"  @click="addProduct()">Add Product</b-button>

</b-row>




        
      </b-card>
    </b-col>
    <b-col cols="5">
      <b-card border-variant="dark" header="Added Products" align="left" class="h-100 w-100 d-inline-block">
        <template v-slot:header>
          <h6 class="mb-0 d-inline">Added Products</h6>
          <button type="button" class="btn btn-dark btn-sm float-right mx-1 align-self-center" :disabled="validateSaveOrder" @click="saveOrder">Save Order</button>
          <button type="button" class="btn btn-sm btn-dark float-right" :disabled="validateSaveQuote" @click="saveQuote">Save Quote</button>
        </template>
        @can('admin',\App\Product::class)
        <b-row>
          <b-col cols="12">
            <b-form-select v-model="franchise_id" class="mb-1" size="sm" id="input-franchise"
              @input="onFranchiseSelected">
              @foreach($franchises as $franchise)
              <optgroup label="{{$franchise->name}}">
                @foreach($franchise->users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
              </optgroup>
              @endforeach
            </b-form-select>
          </b-col>
        </b-row>
        @endcan
        <b-row>
          <b-col cols="12">
            <b-form-select v-model="client" :options="clients" size="sm" value-field="id" text-field="name">
              <template v-slot:first>
                <option :value="null" disabled>-- Please Select Client --</option>
              </template>

            </b-form-select>
          </b-col>
        </b-row>
        <b-row class="table-responsive">
          <template>
            <div>
              <b-table :items="quotes" :fields="quoteFields" striped responsive="sm">
                <template v-slot:cell(show_details)="row">
                  <b-button size="sm" @click="row.toggleDetails" class="mr-2">
                 <i :class="{ 'ti-minus': row.detailsShowing, 'ti-plus': !row.detailsShowing }" ></i>
                  </b-button>
                  <b-button size="sm" @click="editQuote(row.index)" class="ml-2">
                      <i class="ti-pencil" ></i>
                       </b-button>
                       <b-button size="sm" @click="removeQuote(row.index)" class="ml-2">
                          <i class="ti-close" ></i>
                           </b-button>
                

                  
                </template>

                <template v-slot:row-details="row">
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
                      <b-col><template v-if="!orderPage"> 
                          <p v-for="(qty,k,index) in row.item.quantities"><b>@{{qty}}:-</b>@{{row.item.prices[qty]}}</p>
                        </template>
                        <template v-else> 
                            <p><b>@{{row.item.quantities}}:-</b>@{{row.item.prices[row.item.quantities]}}</p>
                          </template></b-col>
                        </b-row>

                    <b-row class="mb-2">
                      <b-col sm="6" class="text-sm-left mb-1"><b>Treatments:</b></b-col>
                    <b-col><p v-for="(treat,keyt,indext) of row.item.treatments"><b>@{{keyt}}</b>@{{treat}}</p></b-col>
                    </b-row>
                    <b-row class="mb-2">
                        <b-col sm="6" class="text-sm-left"><b>Addons:</b></b-col>
                        <b-col><p v-for="add of row.item.addOns"><b>@{{add.name + ':' + add.price}}</b></p></b-col>
                      </b-row>

                    <b-button size="sm" @click="row.toggleDetails">Hide Details</b-button>
                  </b-card>
                </template>
              </b-table>
            </div>
          </template>


        </b-row>
      </b-card>
    </b-col>
    @{{data}}
  </b-row>


</b-container>
@endsection

@section('scripts')
<script>
  var vm = new Vue({
el:'#vestimate',
data(){
  return{
    categories:{!!$categories!!},//used in select input
    category:{},//selected category data
    products:[],//used in categories products select input
    papers:[],//used in selected product papers
    quantities:[],//used in products quantities
    sizes:[],//used in products sizes
    debug:false,
    catJsons:{!!$catJsons!!},//Categories JSONs
    catJson:[],//selected category json
    treeAllTreatments:[],
    treatments:[],//used in selected paper treatments
    printingOptions:[],//used to show printing options
    qPricesTableHeads:['Selected','Qty','PPC','MPPC','Total','MTotal'],
    qPricesTable:[],
    tableQuantities:[],
    printing:{},  //product printing  
    prices:{},//product quantities prices
    perCardPrices:{},//product quantities percard prices
    mprices:{},//product quantities margin prices
    mperCardPrices:{},//product quantities percard margin prices
    data:{paper:null,treatments:{},prices:{},size:null,printing:null,category:{id:null,name:'',margin:0},product:{id:null,name:''},quantities:[],addOns:[],addOnPrice:0},
    settings:{price:{printing:0,size:0}},
    quotes:[],
    quoteFields:[{ key: 'product.name', label: 'Products' },'show_details'
  ],
    myTreatments:{foiling:{front:[],back:[]},electroplating:{front:[],back:[]},letterpress:{front:[],back:[]},embossing:{side:''},spotgloss:{side:''},raised_spot_gloss:{side:''},round_corners:{side:''},edgepaint:{color:''},laser_cut:{side:''},laser_engrave:{side:''},silk_screen:{side:''}},
    clients:{!! $clients?$clients:'{}' !!},//used in quote saving input,
    client:'{!! isset($records['client_id'])?$records['client_id']:'' !!}',
    franchises:{!! $franchises?$franchises:'[]' !!},
    franchise_id:'{!! $franchise_id?$franchise_id:0 !!}',
    role_id:'{!! $role_id?$role_id:0 !!}',
    placeOrder:false,
    orderPage:{{$boolOrder}},
    addOnProducts:{!!$addOnProducts!!},
    addOns:[],
    boolEditQuote:false,
    order_id:{!! isset($records['order_id'])?$records['order_id']:0 !!},
    quote_id:{!! isset($records['quote_id'])?$records['quote_id']:0 !!},
    // define the treeselect value
    treeTreatmentValues: [],
    treeTreatments: [ 
    
  ],
  fieldQuotes: [
          // A virtual column that doesn't exist in items
          { key: 'product.name', label: 'Product' },
          // A column that needs custom formatting
          { key: 'product.paper', label: 'Prices' },
          // A regular column
          '#'
          
        ],
        itemsSmall: [
          { name: { first: 'John', last: 'Doe' }, sex: 'Male', age: 42 },
          { name: { first: 'Jane', last: 'Doe' }, sex: 'Female', age: 36 },
          { name: { first: 'Rubin', last: 'Kincade' }, sex: 'Male', age: 73 },
          { name: { first: 'Shirley', last: 'Partridge' }, sex: 'Female', age: 62 }
        ]
}//return
},//data
methods:{
  resetCategorySelected:function(){
//vm.products = [];
//vm.resetProductSelected();
  },
  onCategorySelected:function(e){
      for(cat of vm.categories){
   if(cat.id==vm.data.category.id){
     vm.data.category.name = cat.name;
     vm.products = cat.products;
     vm.category = cat;
     if(vm.role_id)
     vm.setCategoryMargin();     
     break;
   }

    }
   vm.catJson = vm.catJsons[e];
   vm.fillTreatments();
  },//function
resetProductSelected:function(){
vm.data = {paper:{},treatments:{},prices:{},size:{},printing:'',category:{id:vm.data.category.id,name:vm.data.category.name},product:{id:'',name:''},quantities:[],addOns:[],addOnPrice:0};
vm.myTreatments={foiling:{front:[],back:[]},electroplating:{front:[],back:[]},letterpress:{front:[],back:[]},embossing:{side:''},spotgloss:{side:''},raised_spot_gloss:{side:''},round_corners:{side:''},edgepaint:{color:''},laser_cut:{side:''},laser_engrave:{side:''},silk_screen:{side:''}};
vm.treatments=[];
vm.treeTreatmentValues=[];
vm.treeTreatments = [];
vm.settings= {price:{printing:0,size:0}};
vm.prices = {};
vm.perCardPrices={};
vm.papers=[];
vm.quantities = [];
vm.sizes = [];
vm.addOns=[];
vm.addOnprice=0;
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
if(!vm.orderPage && !vm.boolEditQuote)
vm.data.quantities.push(vm.catJson.products[e].quantities.selected);
else if(!vm.boolEditQuote)
vm.data.quantities=vm.catJson.products[e].quantities.selected;
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

vm.fillSelectTreatments();
  },
onPaperSelected:function(e){
console.log(vm.catJson.products[vm.data.product.id].papers);
vm.paper = vm.catJson.products[vm.data.product.id].papers.opts[e];
vm.fillSelectTreatments();
vm.calcQntiesCardPrice();
  }, 
calcPerCardPrice:function(qty){
  let ppc = (vm.calcQtyCardPrice(qty)/qty).toFixed(2);
vm.perCardPrices[qty] = ppc;
vm.mperCardPrices[qty] = (ppc - ((vm.data.category.margin*ppc)/100)).toFixed(2);
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
let f = Array.isArray(vm.data.treatments[treat].front)?vm.data.treatments[treat].front:[];
let b = Array.isArray(vm.data.treatments[treat].back)?vm.data.treatments[treat].back:[];
let colors = f.concat(b);
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
vm.prices[qty]=price.toFixed(2);
vm.mprices[qty]=price - ((vm.data.category.margin*price)/100).toFixed(2);
return price;
  },
calcQntiesCardPrice:function(){
  vm.qPricesTable=[];
for(qty in vm.quantities){
  vm.calcQtyCardPrice(qty);
  vm.calcPerCardPrice(qty);
  vm.qPricesTable.push({Qty:qty,PPC:vm.perCardPrices[qty],MPPC:vm.mperCardPrices[qty],Total:vm.prices[qty],MTotal:vm.mprices[qty]});
  
}
console.log('select row');

  },
myTreatmentSelected:function(e){
  console.log('wwwww');
  let price=0;
for(treat of vm.treatments){
  treat = treat.toLowerCase().replace(' ','');
  if(typeof vm.data.treatments[treat]!=='undefined')
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
  vm.data.mprices=vm.mprices;
  vm.quotes.push(vm.data);
  console.log('add data');
  console.log(vm.data);
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
     vm.role_id = user.pivot.role_id;
     vm.setCategoryMargin();
     break;
   }
  }
}
vm.calcQntiesCardPrice();
},
onAddOnProductSelected:function(e){
  let price=0;
  vm.data.addOns=[];
for(addOnProduct of vm.addOnProducts){
  if(e.indexOf(addOnProduct.id)!==-1){
    vm.data.addOns.push(addOnProduct);
  price += addOnProduct.price;
  }
}
vm.data.addOnPrice = price;
},
saveQuote:function(){
  let data = {
    client_id:vm.client,
    franchise_id:vm.franchise_id,
    id:vm.quote_id,
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
    id:vm.order_id,
    estimate:vm.quotes
  
  }
console.log('save order');
console.log(data);
const apiServer = "{{route('orders.qstore')}}";
      console.log(apiServer);
      axios.post(`${apiServer}`, data).then((res)=>{
        if(res.data.success){
         vm.resetProductSelected();
         window.location.href='{{route("orders.index")}}';
        }
        console.log(res);
      });
},
canPlaceOrder:function(){
  let placeOrder=true;
  for(quote of vm.quotes){
    if(Array.isArray(quote.quantities) && quote.quantities.length>1){
    placeOrder=false; 
break;
    }   
  }
  vm.placeOrder = placeOrder;
},//function
editQuote:function(index){
  vm.boolEditQuote=true;
  vm.data = Object.assign({},vm.quotes[index]);
  if(Array.isArray(vm.data.quantities) && vm.orderPage){
    console.log('order quantity');
    console.log(vm.data.quantities);
    vm.data.quantities=vm.data.quantities[0];
  }
  
  if(vm.data.addOns){
    for(adon of vm.data.addOns)
  vm.addOns.push(adon.id);
  }
  console.log(vm.myTreatments);
  console.log(vm.data.treatments);
 for(treat in vm.myTreatments){
    if(typeof vm.data.treatments[treat]!=='undefined'){
      vm.myTreatments[treat] =vm.data.treatments[treat];
      switch(treat){
        case 'electroplating':
        case 'foiling':
        case 'letterpress':
for(side in vm.data.treatments[treat]){
  for(color of vm.data.treatments[treat][side])
  vm.treeTreatmentValues.push(treat+'.'+side+'.'+color);
}
        break;
        case  'round_corners':
        case  'embossing':
        case 'laser_cut':
        for(side in vm.data.treatments[treat]){
    vm.treeTreatmentValues.push(treat+'.'+side);
}
        break;
        case 'laser_engrave': 
        case 'raised_spot_gloss':  
        case 'spotgloss': 
        case 'silk_screen':
        for(side in vm.data.treatments[treat]){
    vm.treeTreatmentValues.push(treat+'.'+side);
}
        break;
        case 'edgepaint':

        break;
      }
    }
  } 
  vm.quotes=vm.quotes.filter(function(value,indexq,arr){
return indexq!=index;
  });

},
removeQuote:function(index){
  console.log('remove quote');
console.log(index);
if(confirm('Are you sure to remove quote y/n')){
  vm.quotes=vm.quotes.filter(function(value,indexq,arr){
return indexq!=index;
  });
}
  

},
setCategoryMargin:function(){
  for(role of vm.category.role_margins){
    if(role.role_id==vm.role_id){
vm.data.category.margin = role.marginp;
    }
  }

},//function
  fillTreatments:function(){
    console.log('fillTreatments');
    let treat=[];
   vm.treeAllTreatments =[];
    for(treatment in vm.catJson.treatments){
      let labelTreatment = treatment.toUpperCase().replace(/_/g,'');
  switch(treatment){
case 'foiling':
case 'electroplating':
case 'letterpress':
let colorsf = [];
let colorsb = [];
for(color in vm.catJson.treatments[treatment].opts.colors){
colorsf.push({id:treatment+'.front.'+color,label:color,type:treatment});
colorsb.push({id:treatment+'.back.'+color,label:color,type:treatment});
      }
      vm.treeAllTreatments.push({id:treatment,label:labelTreatment,children:[{id:'front',label:'Front',type:treatment,children:colorsf},{id:'back',label:'Back',children:colorsb}]});
break;
case  'round_corners':
 case  'embossing':
 case 'laser_cut':
 vm.treeAllTreatments.push({id:treatment,label:labelTreatment,children:[{id:treatment+'.single',label:'Yes',type:treatment}]});
 break;
 case 'laser_engrave': 
 case 'raised_spot_gloss':  
 case 'spotgloss': 
 case 'silk_screen':
 vm.treeAllTreatments.push({id:treatment,label:labelTreatment,children:[{id:treatment+'.single',label:'Single Side',type:treatment,isDisabled:false},{id:treatment+'.both',label:'Both Sides',type:treatment,isDisabled:false}]});
 break;
 case 'edgepaint':

 break;
    }//switch

    }
  },//function
  fillSelectTreatments:function(){
    console.log('fillselecttreatments');
    console.log(vm.treatments);
    vm.treeTreatments = [];
    for(treat of vm.treeAllTreatments){
      if(vm.treatments.indexOf(treat.id)!==-1)
      vm.treeTreatments.push(treat);

    }
  },//function
selectTreatment:function(node,instance){
console.log('select treatment');
console.log(node);
console.log(instance);
if(typeof vm.data.treatments[node.type] === 'undefined')
vm.data.treatments[node.type]={};
let treat = node.id.split('.');
//console.log(instance);
//console.log(vm.treePrintValue);
switch(node.type){
case 'foiling':
case 'electroplating':
case 'letterpress':
if(!Array.isArray(vm.data.treatments[node.type][treat[1]]))
vm.data.treatments[node.type][treat[1]] = [];
vm.data.treatments[node.type][treat[1]].push(treat[2]);

break;
case  'round_corners':
case  'embossing':
case 'laser_cut':
vm.data.treatments[node.type]['side'] = 'single';
 /*  for(print of vm.treePrint[1].children){
  console.log(print);
  if(print.id != node.id){
    print.isDisabled=true;

  }
}  */
//vm.data.treatments[node.type]
  break;
case 'laser_engrave': 
 case 'raised_spot_gloss':  
 case 'spotgloss': 
 case 'silk_screen': 
 for(x of vm.treeTreatments){
  console.log(x);
  if(x.id == node.type){
    for(y of x.children){
      if(y.id != node.id){
    y.isDisabled=true;

  }
    }
break;
  }
 
}
vm.data.treatments[node.type]['side'] = treat[1];
  break;
case 'edgepaint':

break;

}
vm.calcQntiesCardPrice();
  },
deSelectTreatment:function(node,instance){
console.log('deselect print');

switch(node.type){
case 'foiling':
case 'electroplating':
case 'letterpress': 
let treat = node.id.split('.');
let pos = vm.data.treatments[node.type][treat[1]].indexOf(treat[2]);
vm.data.treatments[node.type][treat[1]].splice(pos,1);
break;
case  'round_corners':
case  'embossing':
case 'laser_cut':
delete vm.data.treatments[node.type];
break;
 case 'laser_engrave': 
 case 'raised_spot_gloss':  
 case 'spotgloss': 
 case 'silk_screen':
 for(x of vm.treeTreatments){
  console.log(x);
  if(x.id == node.type){
    for(y of x.children){
      if(y.id != node.id){
    y.isDisabled=false;

  }
    }
break;
  }
 
}
delete vm.data.treatments[node.type];
  break;
case 'edgepaint':

break;

}
vm.calcQntiesCardPrice();
  }, 
  onQuantitySelected(items) {
    vm.data.quantities = [];
    for(item of items)
    vm.data.quantities.push(item.Qty);
      },
  selectThirdRow() {
        // Rows are indexed from 0, so the third row is index 2
        vm.$refs.quantityTable.selectRow(2);
      }
  
},
computed:{
disableProduct:function(){
  return this.data.quantities.length === 0;

},
validateSaveQuote:function(){
  return !(this.quotes.length && this.client!=='');

},
validateSaveOrder:function(){
  return !(this.placeOrder && this.client!=='');

},
isQtySelected:function(key){
  console.log('qqqqq');
  console.log(key);
return true;
}
},
mounted: function () {
  this.$nextTick(function () {
    console.log('mounted');
   let quotes =[];
   @php
if(isset($records['quotes'])){
 
foreach($records['quotes'] as $k=>$quote){
  if(is_object($quote))
  $quote=json_encode($quote);
print 'quotes.push('.$quote.');';
}
print "console.log('edit order');";
print 'console.log(quotes);';
print 'vm.quotes =quotes;';

print "console.log($k);";
print 'vm.editQuote('.$k.');';
}

   @endphp
   

    vm.onFranchiseSelected(vm.franchise_id);
    vm.resetCategorySelected();
    


  })
}
});
  
</script>
@endsection