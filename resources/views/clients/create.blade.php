@extends('template')
@section('content')

<div class="container-fluid container-fullw bg-white" id="vapp">
    <h2>Add Client</h2><br>
    <!--client-->

    <template>
            <div>
              <b-form @submit="onSubmit" @reset="onReset">
                    
                    @can('super',\App\Product::class)
                    <b-form-group id="input-group-franchise" label="Franchisee:" label-for="input-franchise">
                    <b-form-select v-model="form.franchise_id" class="mb-3" id="input-franchise">
                            @foreach($franchises as $franchise)
                    <optgroup label="{{$franchise->name}}">
                            @foreach($franchise->users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                            </optgroup>
                            @endforeach
                        </b-form-select>

                        <div class="mt-2">Selected: <strong>@{{ selected }}</strong></div>
                    </b-form-group>
                    @endcan
                <b-form-group id="input-group-client" label="Client Name:" label-for="input-client">
                  <b-form-input
                    id="input-client"
                    v-model="form.name"
                    required
                    placeholder="Enter name"
                  ></b-form-input>
                </b-form-group>

                <b-form-group
                    id="input-group-email"
                    label="Email address:"
                    label-for="input-email"
                    
      >
        <b-form-input
          id="input-1"
          v-model="form.email"
          type="email"
          required
          placeholder="Enter email"
        ></b-form-input>
      </b-form-group>
      <b-form-group
                    id="input-group-mobile"
                    label="Mobile Number:"
                    label-for="input-mobile"
                    
      >
        <b-form-input
          id="input-mobile"
          v-model="form.mobile"
          required
          placeholder="Enter Mobile Number"
        ></b-form-input>
      </b-form-group>
      <b-form-group
                    id="input-group-city"
                    label="City:"
                    label-for="input-city"
                    
      >
        <b-form-input
          id="input-city"
          v-model="form.city"
          required
          placeholder="Enter City Name"
        ></b-form-input>
      </b-form-group>
         
      <b-form-group
                    id="input-group-state"
                    label="State:"
                    label-for="input-state"
                    
      >
        <b-form-input
          id="input-state"
          v-model="form.state"
          required
          placeholder="Enter State Name"
        ></b-form-input>
      </b-form-group>

      <b-form-group
      id="input-group-country"
      label="Country:"
      label-for="input-country"
      
>
<b-form-input
id="input-country"
v-model="form.country"
required
placeholder="Enter Country Name"
></b-form-input>
</b-form-group>

                
          
                <b-button type="submit" variant="primary">Submit</b-button>
                
              </b-form>

            </div>
          </template>
</div>
<form action="{{route('clients.store')}}" method="post" id="client-create">
        @csrf
        
      <input type="hidden" name="name" id="client-name" value="">
      <input type="hidden" name="franchise_id" id="client-franchise-id" value="">
      <input type="hidden" name="email" id="client-email" value="">
      <input type="hidden" name="mobile" id="client-mobile" value="">
      <input type="hidden" name="city" id="client-city" value="">
      <input type="hidden" name="state" id="client-state" value="">
      <input type="hidden" name="country" id="client-country" value="">
        
      </form>
      
@endsection


@section('scripts')
<script>
var vm=new Vue({
el:'#vapp',
    data() {
      return {
        form: {
          email: '',
          name: '',
          franchise_id:'{{$franchise_id}}',
          mobile:'',
          city: '',
          state: '',
          country:''
        }

      }
    },
    methods: {
      onSubmit(evt) {
        evt.preventDefault();
        //alert(JSON.stringify(this.form));
        document.getElementById('client-franchise-id').value = vm.form.franchise_id;
        document.getElementById('client-name').value = vm.form.name;
        document.getElementById('client-email').value = vm.form.email;
        document.getElementById('client-mobile').value = vm.form.mobile;
        document.getElementById('client-city').value = vm.form.city;
        document.getElementById('client-state').value = vm.form.state;
        document.getElementById('client-country').value = vm.form.country;
        let form = document.getElementById('client-create');
        form.submit();
      },
      onReset(evt) {
        evt.preventDefault()
        // Reset our form values
        this.form.email = ''
        this.form.name = ''
        this.form.food = null
        this.form.checked = []
        // Trick to reset/clear native browser form validation state
        this.show = false
        this.$nextTick(() => {
          this.show = true
        })
      }
    }
  });
</script>
@endsection