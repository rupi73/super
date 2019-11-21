@extends('template')
@section('content')
<div class="container">
    <div class="row">
        <h2 class="display-4">ORDER EDIT</h2>
        <div class="col-md-8 mt-5">
            <form action="">

                <div class="form-group">
                    <label for="franchise_id">Franchise_id</label>
                    <input type="text" class="form-control" name="franchise_id">

                </div>

                <div class="form-group">
                        <label for="client_id">Client_id</label>
                        <input type="text" class="form-control" name="client_id">
    
                </div>

                <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="text" class="form-control" name="amount">
    
                </div>

                <div class="form-group">
                        <label for="tax">Tax</label>
                        <input type="text" class="form-control" name="tax">
    
                </div>

                <div class="form-group">
                        <label for="grossTotal">GrossTotal</label>
                        <input type="text" class="form-control" name="grossTotal">
    
                </div>

               <Button type="submit" class="btn btn-primary">Save</Button>
            </form><!--end form-->
        </div><!--end colom-->
    </div><!--end row-->
</div><!--end container-->

@endsection