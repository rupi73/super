@extends('template')
@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-6">

            <div class="card">
                <div class="title">
                    
                    <h2 class="display-5">SHOW OREDER DEATILS</h2>
                </div>
                    <div class="content">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Franchise_ID</td>
                                    <td></td>    
                                </tr>
                                <tr>
                                        <td>Client_ID:</td>
                                        <td></td>
                                </tr>

                                        <tr>
                                                <td>Amount </td>
                                                <td></td>    
                                            </tr>

                                                 <tr>
                                                    <td>Tax </td>
                                                    <td></td>    
                                                </tr>

                                                <tr>
                                                        <td>GrossTable</td>
                                                        <td></td>    
                                                    </tr>

                                                   

                            </thead>
                        </table> 
                                   
                               

                    
                </div><!--close  content-->
            </div><!--close  card-->
            
        </div><!--close  col-md-8-->
    </div><!--close  row-->
</div><!--close  container-->


@endsection

