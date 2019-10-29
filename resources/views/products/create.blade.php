@extends('template')

@section('content')
<div class="container-fluid container-fullw bg-white" id="vapp">
  <h2>Product Create</h2><br>
  
<div class="row">
<div class="col-md-4"><template>
    <div>
      <b-form-input v-model="productName" placeholder="product name"></b-form-input>
      <div class="mt-2"></div>
    </div>
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
          text-field="paperName" @change="temp" multiple>
            <!-- This slot appears above the options from 'options' prop -->
            <template v-slot:first>
              <option :value="null" disabled>-- Please select Papers --</option>
            </template>
      

          </b-form-select>
      
          <div class="mt-3" v-if="debug">Selected: <strong>@{{ cPapers }}</strong></div>
        </div>
      </template>
</div>
</div><!--row-->
<div class="row mt-2" v-if="categoryId && cPapers.length">
    <div class="col-md-4" >
        <template>
            <div>
              <b-form-select v-model="productQuantities" :options="cQuantities" class="mb-3" value-field="id"
              text-field="label" multiple>
                <!-- This slot appears above the options from 'options' prop -->
                <template v-slot:first>
                  <option :value="null" disabled>-- Please select Quantities --</option>
                </template>
          

              </b-form-select>
          
              <div class="mt-3" v-if="debug">Selected: <strong>@{{ cQuantities }}</strong></div>
            </div>
          </template>
    </div>
    <div class="col-md-4">
        <template>
            <div>
              <b-form-select v-model="productSizes" :options="cSizes" class="mb-3" value-field="id"
              text-field="label" multiple>
                <!-- This slot appears above the options from 'options' prop -->
                <template v-slot:first>
                  <option :value="null" disabled>-- Please select Sizes --</option>
                </template>
          

              </b-form-select>
          
              <div class="mt-3" v-if="debug">Selected: <strong>@{{ cSizes }}</strong></div>
            </div>
          </template>
    </div>

    <div class="col-md-4">
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
<form action="{{route('products.store')}}" method="post" id="product-create">
  @csrf
<input type="hidden" name="name" id="product-name" value="">
<input type="hidden" name="category_id" id="category-id" value="">
<input type="hidden" name="price" id="product-price" value="">
<input type="hidden" name="papers" id="product-papers" value="">
<input type="hidden" name="quantities" id="product-quantities" value="">
<input type="hidden" name="sizes" id="product-sizes" value="">
</form>
@endsection

@section('scripts')
<script>
  console.log({!!$categories!!});
var vm=new Vue({
el:'#vapp',
data() {
    return {
categories:{!!$categories!!},
categoryId:'',
cSizes:[],
cQuantities:[],
cPapers:[],
selectedPapers:[],
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
temp:function(){
  console.log(vm.selectedPapers);
},
onSubmit:function() {
        document.getElementById('product-name').value = vm.productName;
        document.getElementById('category-id').value = vm.categoryId;
        document.getElementById('product-price').value = vm.productPrice;
        document.getElementById('product-papers').value = vm.productPapers;
        document.getElementById('product-quantities').value = vm.productQuantities;
        document.getElementById('product-sizes').value = vm.productSizes;
        let form = document.getElementById('product-create');
        form.submit();
      }
    }
  },
  watch: {

  },
  filters: {
   
  },
});
</script>
@endsection