@extends('template')
@section('content')

<div class="container">

    <div class="row">

        <div class="col-md-12">

        <h2 class="display-4">Wallet Details<small>{{$balance}}</small></h2>
            <table class="table">

                <thead>
                    <tr>

         
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Type</th>
                        <th>Detail</th>
                        
                    </tr>
                </thead>
                    <tbody>
                    @foreach($transactions as $transaction)       
                        <tr>
                        <td>{{$transaction->updated_at}}</td>
                     
                     <td>{{$transaction->amount}}</td>
                     <td>{{$transaction->type}}</td>
                     <td>@if($transaction->payment)
                    {{$transaction->payment->gateway}}/{{$transaction->payment->gateway_transaction_id}}
                    @endif
                    </td>
                     
                       
                            
                       
                        </tr>
                        @endforeach
                    </tbody>
                </table><!--end table-->
        </div><!--end colom-->
    </div><!--end row-->
</div><!--end container-->









@endsection