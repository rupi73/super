<script>
    var vm = new Vue({
    el:'#vapp',
    methods:{
      deleteRecord:function(id){
       if(confirm('Do you want to delete the record')){
        let form = document.getElementById('form-delete-'+id);
        form.submit();
       }
    //console.log(form);
      }
    }
    });
    </script>