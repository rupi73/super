@extends('template')
@section('content')
<div class="container bg-white" id="vestimate">
  <div class="row">
    <div class="col-md-5">
      <h1 class="display-5 my-3 "><b>Calculator</b></h1>

      <div class="row">

        <div class="col-md-6">
          <div class="form-group">
            <b-form-select v-model="data.category.id" :options="categories" class="mb-3" value-field="id"
              text-field="name" value="" @input="onCategorySelected">
              <!-- This slot appears above the options from 'options' prop -->
              <template v-slot:first>
                <option :value="null" disabled>-- Please select Category --</option>
              </template>


            </b-form-select>

          </div>
        </div>
        <div class="col-md-6">

          <div class="form-group">

            <b-form-select v-model="data.product.id" :options="products" class="mb-3" value-field="id" text-field="name"
              value="" @input="onProductSelected">
              <!-- This slot appears above the options from 'options' prop -->
              <template v-slot:first>
                <option :value="null" disabled>-- Please select Product --</option>
              </template>


            </b-form-select>

          </div>
        </div>
      </div>
      <!--estimate row close-->
      <hr>





      @if(false)
      <template>
        <div>
          <vue-multi-select ref="multiSelect" v-model="values" search historyButton :options="options"
            :filters="filters" :btn-label="btnLabel" @open="open" @close="close" :select-options="data1">
            <template v-slot:option="{option}">
              <input type="radio" :checked="option.selected" />
              <span>@{{option.name}}</span>
            </template>
          </vue-multi-select>
          <button @click="openManually">
            Open manually
          </button>
        </div>
      </template>
      @endif
      <div class="row mb-5 d-flex flex-column" style="height:50%">
        <div class="col-md-12">
          <treeselect :multiple="true" :options="treePrint" :always-open=true :disable-branch-nodes=true
            :default-expand-level="1" :searchable=false placeholder="Choose Paper Size Printing and Optional Treatments..." max-height=625 allow-clearing-disabled=true
            v-model="treePrintValue" @select="selectPrint" @deselect="deSelectPrint" />
          <treeselect-value :value="value" />
        </div>
      </div>


      <!--accordian close-->
    </div>
    <!--col-md-5  close-->

    <div class="col-md-7">

      <div class="card mt-4">
        <div class="card-header">
          <h2 class="text-center">ADD PRODUCTS</h2>
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th>
                  <h6><b>QUANTITY</b></h6>
                </th>
                <th>
                  <h6><b>PPC</b></h6>
                </th>
                <th>
                  <h6><b>TOTAL</b></h6>
                </th>
                <th>
                  <h6><b>Margin</b></h6>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <h6>
                    <div class="custom-control custom-checkbox mb-3">
                      <input type="checkbox" class="custom-control-input " id="customCheck" name="example1">
                      <label class="custom-control-label" for="customCheck">
                        <h5 class="ml-4">1000</h5>
                      </label>
                    </div>
                  </h6>
                </td>
                <td>
                  <h5>₹ 10</h5>
                </td>
                <td>
                  <h5>₹ 1000</h5>
                </td>

                <td>
                  <h5>₹ 1000</h5>
                </td>
              </tr>


              <tr>
                <td>
                  <h6>
                    <div class="custom-control custom-checkbox mb-3">
                      <input type="checkbox" class="custom-control-input " id="customCheck" name="example1">
                      <label class="custom-control-label" for="customCheck">
                        <h5 class="ml-4">1000</h5>
                      </label>
                    </div>
                  </h6>
                </td>
                <td>
                  <h5>₹ 10</h5>
                </td>
                <td>
                  <h5>₹ 1000</h5>
                </td>

                <td>
                  <h5>₹ 1000</h5>
                </td>
              </tr>


              <tr>
                <td>
                  <h6>

                    <div class="custom-control custom-checkbox mb-3">
                      <input type="checkbox" class="custom-control-input " id="customCheck" name="example1">
                      <label class="custom-control-label" for="customCheck">
                        <h5 class="ml-4">1000</h5>
                      </label>
                    </div>
                  </h6>
                </td>
                <td>
                  <h5>₹ 10</h5>
                </td>
                <td>
                  <h5>₹ 1000</h5>
                </td>

                <td>
                  <h5>₹ 1000</h5>
                </td>
              </tr>
            </tbody>
          </table>



          <table class="table">
            <tbody>
              <tr>
                <td>
                  <h6><b>Category </b></h6>
                </td>
                <td>Business Card</td>

              </tr>

              <tr>
                <td>
                  <h6><b>Product </b></h6>
                </td>
                <td>Matt finish</td>

              </tr>

              <tr>
                <td>
                  <h6><b>Size </b></h6>
                </td>
                <td> 3.5" x 2"</td>

              </tr>

              <tr>
                <td>
                  <h6><b>Printing </b></h6>
                </td>
                <td> single</td>

              </tr>

              <tr>
                <td>
                  <h6><b>Paper </b></h6>
                </td>
                <td> SOFT SUEDE 500gsm</td>

              </tr>

              <tr>
                <td>
                  <h6><b>Treatments </b></h6>
                </td>
                <td>Null</td>

              </tr>
            </tbody>

          </table>
        </div>
      </div>

    </div>
  </div>
  <!--first row close-->

  <!--first container close-->


  <h2 class="display-4 my-5"> Detail</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>
          <h5>Category</h5>
        </th>
        <th>
          <h5>Product</h5>
        </th>
        <th>
          <h5>Quantity</h5>
        </th>
        <th>
          <h5>Size</h5>
        </th>
        <th>
          <h5>Paper</h5>
        </th>
        <th>
          <h5>Treatments</h5>
        </th>
        <th>
          <h5>AddOnProducts</h5>
        </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>business card</td>
        <td>matt finish</td>
        <td>200</td>
        <td>5mm</td>
        <td>foiling</td>
        <td>null</td>
        <td>null</td>
      </tr>
      <tr>
        <td>business card</td>
        <td>matt finish</td>
        <td>200</td>
        <td>5mm</td>
        <td>foiling</td>
        <td>null</td>
        <td>null</td>
      <tr>
        <td>business card</td>
        <td>matt finish</td>
        <td>200</td>
        <td>5mm</td>
        <td>foiling</td>
        <td>null</td>
        <td>null</td>
      </tr>
    </tbody>
  </table>
  <!--table close-->

  <!--table container close-->





  <div class="row">


    <div class="col-md-3">
      <div class="form-group">
        <label for="franchise"> </label>
        <select class="form-control">
          <option value="selected">ADD ON FRANCHISE</option>
          <option> Mohinder</option>
          <option> Mohinder</option>
        </select>

      </div>
    </div>
    <div class="col-md-3">

      <div class="form-group">
        <label for="franchise"></label>
        <select class="form-control">
          <option value="">Select Clients</option>
          <option> Mohinder</option>
          <option> Mohinder</option>
        </select>

      </div>
    </div>

    <div class="col-md-3 mt-4">
      <button type="sybmit" class="btn btn-primary">Add order</button>
    </div>
    <div class="col-md-3 mt-4">
      <button type="submit" class="btn btn-primary"> Save Order</button>
    </div>

  </div>
  <!--row close-->
</div>
<!--container close-->

<div id="app1">
  <treeselect v-model="value" :multiple="true" :options="treeoptions" />
</div>



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
      treatments:[],//used in selected paper treatments
      printingOptions:[],//used to show printing options
      printing:{},  //product printing  
      prices:{},//product quantities prices
      perCardPrices:{},//product quantities percard prices
      mprices:{},//product quantities prices
      mperCardPrices:{},//product quantities percard prices
      data:{paper:{},treatments:{},prices:{},size:{},printing:'',category:{id:null,name:'',margin:0},product:{id:null,name:''},quantities:[],addOns:[],addOnPrice:0},
      settings:{price:{printing:0,size:0}},
      quotes:[],
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

      btnLabel: values => `Treatments (${values.length})`,
      name: 'first group',
      values: [],
      data1: [{
        name: 'Foiling',
        list: [
          { name: '0' },
          { name: '2' },
          { name: '3' },
          { name: '8' },
          { name: '9' },
          { name: '11' },
          { name: '13' },
          { name: '14' },
          { name: '15' },
          { name: '18' },
        ],
      }, {
        name: 'Electroplating',
        list: [
          { name: '21' },
          { name: '22' },
          { name: '24' },
          { name: '27' },
          { name: '28' },
          { name: '29' },
          { name: '31' },
          { name: '33' },
          { name: '35' },
          { name: '39' },
        ],
      }],
      filters: [{
        nameAll: 'Select all',
        nameNotAll: 'Deselect all',
        func() {
          return true;
        },
      }, {
        nameAll: 'select <= 10',
        nameNotAll: 'Deselect <= 10',
        func(elem) {
          return elem.name <= 10;
        },
      }, {
        nameAll: 'Select contains 2',
        nameNotAll: 'Deselect contains 2',
        func(elem) {
          return elem.name.indexOf('2') !== -1;
        },
      }],
      options: {
        multi: false,
        groups: true,
      },
      
// define the treeselect value
treePrintValue: [],
    treePrint: [ {
      id: 'papers',
      label: 'Papers',
      children: [],
    }, {
      id: 'sizes',
      label: 'Sizes',
      children: [],
    },
    {
      id: 'printing',
      label: 'Printing',
      children: [],
    },
    {
      id: 'foiling',
      label: 'Foiling',
      isDisabled:true,
      children: [],
    }, {
      id: 'electroplating',
      label: 'Electroplating',
      isDisabled:true,
      children: [],
    },
    {
      id: 'letterpress',
      label: 'Letterpress',
      isDisabled:true,
      children: [],
    },
    {
      id: 'round_corners',
      label: 'Roundcorners',
      isDisabled:true,
      children: [],
    }, {
      id: 'embossing',
      label: 'Embossing',
      isDisabled:true,
      children: [],
    },
    {
      id: 'edgepaint',
      label: 'Edgepaint',
      isDisabled:true,
      children: [],
    },
    {
      id: 'raised_spot_gloss',
      label: 'Raisespotgloss',
      isDisabled:true,
      children: [],
    },
    {
      id: 'spotgloss',
      label: 'Spotgloss',
      isDisabled:true,
      children: [],
    },
    {
      id: 'laser_cut',
      label: 'Lasercut',
      isDisabled:true,
      children: [],
    },
    {
      id: 'laser_engrave',
      label: 'LaserEngrave',
      isDisabled:true,
      children: [],
    },
    {
      id: 'silk_screen',
      label: 'SilkScreen',
      isDisabled:true,
      children: [],
    }
  ],
  treeTreatmentValue:[],
  treeTreatments:[
    {
      id: 'foiling',
      label: 'Foiling',
      children: [],
    }, {
      id: 'electroplating',
      label: 'Electroplating',
      children: [],
    },
    {
      id: 'letterpress',
      label: 'Letterpress',
      children: [],
    },
    {
      id: 'round_corners',
      label: 'Roundcorners',
      children: [],
    }, {
      id: 'embossing',
      label: 'Embossing',
      children: [],
    },
    {
      id: 'edgepaint',
      label: 'Edgepaint',
      children: [],
    },
    {
      id: 'raisespotgloss',
      label: 'Raisespotgloss',
      children: [],
    },
    {
      id: 'spotgloss',
      label: 'Spotgloss',
      children: [],
    },
    {
      id: 'laser_cut',
      label: 'Lasercut',
      children: [],
    },
    {
      id: 'laser_engrave',
      label: 'LaserEngrave',
      children: [],
    },
    {
      id: 'silk_screen',
      label: 'Silk Screen',
      children: [],
    }
  ],   
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
     
    },//function
  resetProductSelected:function(){
  vm.data = {paper:{},treatments:{},prices:{},size:{},printing:'',category:{id:vm.data.category.id,name:vm.data.category.name},product:{id:'',name:''},quantities:[],addOns:[],addOnPrice:0};
  vm.myTreatments={foiling:{front:[],back:[]},electroplating:{front:[],back:[]},letterpress:{front:[],back:[]},embossing:{side:''},spotgloss:{side:''},raised_spot_gloss:{side:''},round_corners:{side:''},edgepaint:{color:''},laser_cut:{side:''},laser_engrave:{side:''},silk_screen:{side:''}};
  vm.treatments=[];
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
  vm.fillSelectPrint();
  console.log('quantity');
  console.log(vm.quantities);
  vm.calcQntiesCardPrice();
    },
  onPaperSelected:function(e){
  console.log(vm.catJson.products[vm.data.product.id].papers);
  vm.paper = vm.catJson.products[vm.data.product.id].papers.opts[e];
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
  vm.prices[qty]=price.toFixed(2);
  vm.mprices[qty]=price - ((vm.data.category.margin*price)/100).toFixed(2);
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
selectPrint:function(node,instance){
console.log('select print');
//console.log(node);
//console.log(instance);
//console.log(vm.treePrintValue);
switch(node.type){
  case 'paper': 
  console.log(vm.treePrint);
 for(print of vm.treePrint[0].children){
  console.log(print);
  if(print.id != node.id){
    print.isDisabled=true;

  }
} 
  break;
  case 'size':
  for(print of vm.treePrint[1].children){
  console.log(print);
  if(print.id != node.id){
    print.isDisabled=true;

  }
} 
  break;
  case 'printing':
  for(print of vm.treePrint[2].children){
  console.log(print);
  if(print.id != node.id){
    print.isDisabled=true;

  }
} 
  break;

}
  },
  deSelectPrint:function(node,instance){
console.log('select print');
//console.log(node);
//console.log(instance);
//console.log(vm.treePrintValue);
switch(node.type){
  case 'paper': 
  console.log(vm.treePrint);
 for(print of vm.treePrint[0].children){
  console.log(print);
  if(print.id != node.id){
    print.isDisabled=false;

  }
} 
  break;
  case 'size':
  for(print of vm.treePrint[1].children){
  console.log(print);
  if(print.id != node.id){
    print.isDisabled=false;

  }
} 
  break;
  case 'printing':
  for(print of vm.treePrint[2].children){
  console.log(print);
  if(print.id != node.id){
    print.isDisabled=false;

  }
} 
  break;

}
  },
fillSelectPrint:function(){
  console.log('fillPrintSelect');
for(print of vm.treePrint){
  console.log(print.id);
  console.log(vm[print.id]);
  print.children = [];
  switch(print.id){
    case 'papers':
for(paper of vm.papers)
print.children.push({id:paper,label:paper,type:'paper',isDisabled:false});
vm.treePrintValue.push(vm.data.paper);
    break;
    case 'sizes':
    for(size in vm.sizes)
print.children.push({id:size,label:vm.sizes[size],type:'size',isDisabled:false});
vm.treePrintValue.push(vm.data.size);
    break;
    case 'printing':
    for(printing in vm.printingOptions)
print.children.push({id:printing,label:vm.printingOptions[printing],type:'printing',isDisabled:false});
vm.treePrintValue.push(vm.data.printing);
break;
  }
  //print.children=vm[print.id]
}
vm.fillSelectTreatments();
},
selectTreatment:function(node,instance){
},
deSelectTreatment:function(node,instance){
},
fillSelectTreatments:function(){
  console.log('fillSelectTreatments');
for(treatment of vm.treePrint){
   if(['papers','sizes','printing'].indexOf(treatment.id)!==-1)
  continue;
  console.log(treatment.id);
 // if(!vm.treatments.indexOf(treatment.id)){
treatment.isDisabled=false;
 // }
  //else{
      switch(treatment.id){
      case 'foiling':
      case 'electroplating':
      case 'letterpress':
      let colorsf = [];
      let colorsb = [];
      for(color in vm.catJson.treatments[treatment.id].opts.colors){
colorsf.push({id:treatment.id+'.front.'+color,label:color});
colorsb.push({id:treatment.id+'.back.'+color,label:color});
      }
treatment.children.push({id:'front',label:'Front',children:colorsf});
treatment.children.push({id:'back',label:'Back',children:colorsb});
      break;
 case  'round_corners':
 case  'embossing':
 case 'laser_cut':
 treatment.children.push({id:treatment.id,label:'Yes'});
 break;
 case 'laser_engrave': 
 case 'raised_spot_gloss':  
 case 'spotgloss': 
 case 'silk_screen':
 treatment.children.push({id:treatment.id+'single',label:'Single Side'});
treatment.children.push({id:treatment.id+'both',label:'Both Sides'});

 break;
 case 'edgepaint':

 break;

    }
  //}
}
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
    console.log(vm.myTreatments);
    console.log(vm.data.treatments);
   for(treat in vm.myTreatments){
      if(typeof vm.data.treatments[treat]!=='undefined')
      vm.myTreatments[treat] =vm.data.treatments[treat];
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
  
  }//function
  }//return
  },//data
  computed:{
  disableProduct:function(){
    return this.data.quantities.length === 0;
  
  },
  validateSaveQuote:function(){
    return !(this.quotes.length && this.client!=='');
  
  },
  validateSaveOrder:function(){
    return !(this.placeOrder && this.client!=='');
  
  }
  },
  components: {
    VueMultiSelect
    
  },
    methods: {
    openManually() {
      this.$refs.multiSelect.openMultiSelect();
    },
    open() {
      console.log('open');
    },
    close() {
      console.log('close');
    },
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