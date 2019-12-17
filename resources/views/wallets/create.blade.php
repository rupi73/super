@extends('template')
@section('content')

    <div class="container" id="vapp"> 
        <h4>Add Money To Wallet</h4> 
        @can('super',\App\Product::class)
        <div class="form-group has-success">                 
          <div class="col-sm-6"> 
              <b-form-group
              id="lfranschisee"
  label="Franchisee:"
  label-for="franchisee"
  description="For super admin select franchisee to add money."
>
<b-form-select v-model="user_id" class="mb-3" id="input-franchisee" >
  @foreach($franchises as $franchise)
  <optgroup label="{{$franchise->name}}">
    @foreach($franchise->users as $user)
    <option value="{{$user->id}}">{{$user->name}}</option>
    @endforeach
  </optgroup>
  @endforeach
</b-form-select>
</b-form-group>
          </div> 
      </div> 
        @endcan
            <div class="form-group has-success"> 
                
                <div class="col-sm-6"> 
                    <b-form-group
                    id="lamount"
        label="Amount:"
        label-for="amount"
        description="Amount should not be less than 100."
      >
        <b-form-input
          id="amount"
          v-model="amount"
          type="text"
          required
          placeholder="Enter Amount"
        ></b-form-input>
      </b-form-group>
                </div> 
            </div> 
            <div class="form-group has-success"> 
              <div class="col-sm-6"> 
                    <b-form-group
                    id="lnote"
        label="Note:"
        label-for="note"
        description="Write a note of adding amount. Note should not be less than 10 chars."
      >
        <b-form-input
          id="note"
          v-model="note"
          type="text"
          required
          placeholder="Write Note"
        ></b-form-input>
      </b-form-group>
                </div> 
                @{{amount}}/@{{note}}
            </div> 
            <div class="container"> 
                <button type="button" class="btn btn-success" :disabled="disableAddButton" @click="doPayment()" >Add</button> 
                
            </div> 
         
    </div> 

@endsection

@section('scripts')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var vm = new Vue({
el:'#vapp',
data(){
  return{
    amount:0,
    note:'',
    user_id:{{$franchise_id}},
    initRzr:false,
   capturePayment:function(){
      
    },
    doPayment:function(){
 let rzrOptions ={
      key: "{{ config('myconfig.RAZORPAY_TEST_KEY') }}",
        amount: vm.getAmount,
        name: 'chhapai.com',
        description: 'add money to wallet',
        image: 'https://i.imgur.com/n5tjHFD.png',
        handler: vm.successPayment
    }; 
    let r= new Razorpay(rzrOptions);
  r.open();
    },
    successPayment:function(transaction){
       const apiServer = "{{route('wallets.addRazor')}}";
       let data = {
      amount:vm.amount,
      gateway_transaction_id:transaction.razorpay_payment_id,
      note:vm.note,
      user_id:vm.user_id,
      gateway:'razorpay',
      type:'deposit'

       };
      axios.post(`${apiServer}`, data).then((res)=>{
        if(res.data.success){
          window.location.href='{{route("wallets.index")}}';
        }
        
      }); 
      console.log(transaction);
    }
  }
},
computed:{
  disableAddButton:function(){
    return !(this.amount > 100 && this.note.length > 10);
  },
  getAmount:function(){
    return this.amount*100;
  }
}
});
</script>
@endsection