@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card mb-4">
                <div class="card-body">
                    <h3 class="ml-2">Success!</h3>
                    <table class="table borderless">
                        <tr>
                            <td>Order No</td>
                            <td style="text-align: right">{{ $order->id }}</td>
                        </tr>
                        <tr>
                            <td>Product Name</td>
                            <td style="text-align: right">{{ $order->product->name }}</td>
                        </tr>
                        <tr>
                            <td>Qty</td>
                            <td style="text-align: right">{{ $order->quantity }}</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td style="text-align: right"> {{ $order->amount }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@endpush