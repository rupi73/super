@extends('template')
@section('content')

<div class="container">

    <div class="row">

        <div class="col-md-12">

            <h2 class="display-4">Order Details</h2>
            <table class="table">

                <thead>
                    <tr>

         
                        <th>Franchise_Id</th>
                        <th>Client_ID</th>
                        <th>Amount</th>
                        <th>Tax</th>
                        <th>GrossTotal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                    <tbody>
                           
                        <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                       
                            <td>

                                    <form action="" method="POST">
                            
                                
                                    <a class="btn btn-primary" href="" >Show</a> 
                
                                                <a class="btn btn-primary" href="" >Edit</a> 
                
                                        </form>
                            </td>
                       
                        </tr>
                    </tbody>
                </table><!--end table-->
        </div><!--end colom-->
    </div><!--end row-->
</div><!--end container-->









@endsection