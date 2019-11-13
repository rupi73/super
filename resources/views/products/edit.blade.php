@extends('template')

@section('content')
<div class="container-fluid container-fullw bg-white" id="vapp">
  <h2>Product Modify</h2><br>
  
<div class="row">
<div class="col-md-4"><template>
    
  <vue-bootstrap-typeahead
                              class="mb-4"
                              v-model="pquery"
                              :data="products"
                              :serializer="item => item.post_title"
                              @hit="onProductSelected" 
                              placeholder="Select Product"
                              ref="typeahead"
                            />
</template>
</div>
<div class="col-md-4">
  <template>
    <div>
      <b-form-select v-model="categoryId" :options="categories" class="mb-3" @change="fetchPapersAndSizes" value-field="id"
      text-field="name" value="">
        <!-- This slot appears above the options from 'options' prop -->
        <template v-slot:first>
          <option :value="null" disabled>-- Please select Categories --</option>
        </template>
  

      </b-form-select>
  
      <div class="mt-3" v-if="debug">Selected: <strong>@{{ categoryId }}</strong></div>
    </div>
  </template>
</div>
<div class="col-md-4" v-if="categoryId && cPapers.length">
    <template>
        <div>
          <b-form-select v-model="productPapers" :options="cPapers" class="mb-3" value-field="paper_id"
          text-field="paperName" @input="onPaperSelected" multiple>
            <!-- This slot appears above the options from 'options' prop -->
            <template v-slot:first>
              <option :value="null" disabled>-- Please select Papers --</option>
            </template>
      

          </b-form-select>
          <div class="mt-3">
            <b-form-select v-model="productPaper" :options="lspapers" class="mb-3" value-field="paperName" text-field="paperName">
              <!-- This slot appears above the options from 'options' prop -->
              <template v-slot:first>
                <option :value="null" disabled>-- Default Selected Paper --</option>
              </template>


            </b-form-select>
          </div>
          <div class="mt-3" v-if="debug">Selected: <strong>@{{ productPapers }}</strong></div>
          <div class="mt-3" v-if="debug">Selected: <strong>@{{ lspapers }}</strong></div>
        </div>
      </template>
</div>
</div><!--row-->
<div class="row mt-2" v-if="categoryId && cPapers.length">
    <div class="col-md-3" >
        <template>
            <div>
              <b-form-select v-model="productQuantities" :options="cQuantities" class="mb-3" value-field="id"
              text-field="label" @input="onQuantitySelected" multiple>
                <!-- This slot appears above the options from 'options' prop -->
                <template v-slot:first>
                  <option :value="null" disabled>-- Please select Quantities --</option>
                </template>
          

              </b-form-select>
              <div class="mt-3">
                <b-form-select v-model="productQuantity" :options="lsquantities" class="mb-3" value-field="value"
                  text-field="label">
                  <!-- This slot appears above the options from 'options' prop -->
                  <template v-slot:first>
                    <option :value="null" disabled>-- Default Selected Quantity --</option>
                  </template>
    
    
                </b-form-select>
              </div>
              <div class="mt-3" v-if="debug">Selected: <strong>@{{ productQuantity }}</strong></div>
            </div>
          </template>
    </div>
    <div class="col-md-3">
        <template>
            <div>
              <b-form-select v-model="productSizes" :options="cSizes" class="mb-3" value-field="id"
              text-field="label" @input="onSizeSelected" multiple>
                <!-- This slot appears above the options from 'options' prop -->
                <template v-slot:first>
                  <option :value="null" disabled>-- Please select Sizes --</option>
                </template>
          

              </b-form-select>
              <div class="mt-3">
                <b-form-select v-model="productSize" :options="lssizes" class="mb-3" value-field="value" text-field="label">
                  <!-- This slot appears above the options from 'options' prop -->
                  <template v-slot:first>
                    <option :value="null" disabled>-- Default Selected Size --</option>
                  </template>
    
    
                </b-form-select>
              </div>
              <div class="mt-3" v-if="debug">Selected: <strong>@{{ cSizes }}</strong></div>
            </div>
          </template>
    </div>
    <div class="col-md-3">
      <template>
        <div>
          <b-form-select v-model="productPrinting" :options="pPrinting" class="mb-3">
            <!-- This slot appears above the options from 'options' prop -->
            <template v-slot:first>
              <option :value="null" disabled>-- Please select printing --</option>
            </template>


          </b-form-select>
          <div class="mt-2" v-if="debug">Selected: <strong>@{{ productPrinting }}</strong></div>
        </div>
      </template>
    </div>
    <div class="col-md-3">
      <template>
        <div>
          <b-form-input v-model="productPrice" placeholder="product price" value=0></b-form-input>
          <div class="mt-2" v-if="debug"></div>
        </div>
      </template>
  </div>
  </div><!--row-->
  <div class="row" v-if="categoryId && cPapers.length">
    <div class="col-md-4 offset-md-4"><b-button @click="onSubmit">Save</b-button></div>
  </div><!--row-->

</div><!--container-fluid-->
<form action="{{route('products.update',$product->id)}}" method="post" id="product-create">
  @csrf
  @method('PATCH')
<input type="hidden" name="name" id="product-name" value="">
<input type="hidden" name="wp_product_id" id="product-wp" value="{{$product->wp_product_id}}">
<input type="hidden" name="category_id" id="category-id" value="">
<input type="hidden" name="price" id="product-price" value="">
<input type="hidden" name="papers" id="product-papers" value="">
<input type="hidden" name="quantities" id="product-quantities" value="">
<input type="hidden" name="sizes" id="product-sizes" value="">
<input type="hidden" name="attributes[selected][paper]" id="product-attributes-paper" value="">
  <input type="hidden" name="attributes[selected][size]" id="product-attributes-size" value="">
  <input type="hidden" name="attributes[selected][quantity]" id="product-attributes-quantity" value="">
  <input type="hidden" name="attributes[selected][printing]" id="product-attributes-printing" value="">
</form>
@endsection

@section('scripts')
<script>
var vm=new Vue({
el:'#vapp',
data() {
    return {
pquery:'',
products:[],
product:{ID:{{$product->wp_product_id}},post_title:'{{$product->name}}'},
categories:{!!$categories!!},
productName:'{{$product->name}}',
categoryId:{{$product->category_id}},
cSizes:[],
cQuantities:[],
cPapers:[],
pPrinting:['None','Single Side','Both Sides','Single And Both'],
productPapers:[],
productSizes:[],
productQuantities:[],
productPrinting:'',
productPrice:{{$product->price}},
lsquantities:[],
productQuantity:'',
lssizes:[],
productSize:'',
lspapers:[],
productPaper:'',
productTreatments:[],
debug:false,
fetchPapersAndSizes:function(){
console.log(vm.categoryId);
 for(cat of vm.categories){
   if(cat.id==vm.categoryId){
     console.log(cat.papers);
vm.cQuantities = cat.quantities;
vm.cSizes = cat.sizes;
cat.papers.map((v)=>{v.paperName=v.paper.name;
return v;});
vm.cPapers = cat.papers;
   }
  
} 
/* const apiServer = "{{url('/japi/save_paper_prices')}}";
axios.get(`${apiServer}?cat=${this.category.id}&& q=${newQuery}`)
        .then((res) => {
          //console.log(res)
          this.papers = res.data;
        }) */
},
setValuePaperQntySizes:function(){
  let papers = {!!$product->papers!!};
  let quantities = {!!$product->quantities!!};
  let sizes = {!!$product->sizes!!};
  let attributes = '{!! !is_null($product->attributes)?$product->attributes:'' !!}';
  attributes = attributes.replace(/\\"/g,'');
  console.log(attributes);
  
  for(paper of papers)
  vm.productPapers.push(paper.id);
  for(size of sizes)
  vm.productSizes.push(size.id);
  for(quantity of quantities)
  vm.productQuantities.push(quantity.id);
  vm.onSizeSelected(vm.productSizes);
  vm.onQuantitySelected(vm.productQuantities);
  vm.onPaperSelected(vm.productPapers);
  if(attributes.length){
    attributes = JSON.parse(attributes);
    console.log(attributes);
    vm.productQuantity=attributes.selected.quantity;
    vm.productPaper=attributes.selected.paper;
    vm.productSize=attributes.selected.size;
    vm.productPrinting=attributes.selected.printing;
  }
},
onSubmit:function() {
        document.getElementById('product-name').value = vm.product.post_title;
        document.getElementById('product-wp').value = vm.product.ID;
        document.getElementById('category-id').value = vm.categoryId;
        document.getElementById('product-price').value = vm.productPrice;
        document.getElementById('product-papers').value = vm.productPapers;
        document.getElementById('product-quantities').value = vm.productQuantities;
        document.getElementById('product-sizes').value = vm.productSizes;
        if(vm.productPaper && vm.productQuantity && vm.productSize && vm.productPrinting){
        let attributes = [];
        document.getElementById('product-attributes-paper').value = vm.productPaper;
        document.getElementById('product-attributes-quantity').value=vm.productQuantity;
        document.getElementById('product-attributes-size').value=vm.productSize;
        document.getElementById('product-attributes-printing').value=vm.productPrinting;
        let form = document.getElementById('product-create');
        form.submit();
        }
        else
        alert('All fields are mandatory');
      },
      onProductSelected:function($event){
        vm.product = $event;

      },
      onQuantitySelected:function(e){        
        vm.lsquantities=[];
        for(q of vm.cQuantities){
              if(e.indexOf(q.id)!==-1)
              vm.lsquantities.push(q);
        }
        
        
      },
      onSizeSelected:function(e){ 
        vm.lssizes=[];
        for(q of vm.cSizes){
              if(e.indexOf(q.id)!==-1)
              vm.lssizes.push(q);
        }
        
        
      },
      onPaperSelected:function(e){        
        vm.lspapers=[];
        for(q of vm.cPapers){
              if(e.indexOf(q.paper_id)!==-1)
              vm.lspapers.push(q);
        }
        
        
      }
    }
  },
  watch: {
    pquery(newQuery) {
      const apiServer = "{{config('myconfig.wp_server')}}";
      console.log(apiServer);
      axios.get(`${apiServer}products/${newQuery}`)
        .then((res) => {
          
          this.products = res.data;
          console.log(this.products);
        })
    }
  },
  filters: {
    stringify(value) {
      return JSON.stringify(value, null, 2)
    }
  },
  mounted: function () {
  this.$nextTick(function () {
    console.log(vm.productPapers);
    vm.fetchPapersAndSizes();
    vm.setValuePaperQntySizes();
    this.$refs.typeahead.inputValue = '{{$product->name}}';
  })
}
});
</script>
@endsection