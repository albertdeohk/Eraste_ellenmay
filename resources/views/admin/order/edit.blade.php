@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h4>Detail Transaksi ( Order ID: {{ $order->id }} )</h4>
            <form action="{{ route('order.update', $order->id) }}" method="post">
                @csrf
                @method('put')

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Product Code</label>
                    <div class="col-sm-10">
                        <p class="mt-1">: {{ $order->product->name }}</p>
                        <input type="hidden" name="product_code" value="{{ $order->product_code }}">
                    </div>
              
                    <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
                    <div class="col-sm-10">
                        <p class="mt-1">: {{ $order->quantity }}</p>
                        <input type="hidden" name="quantity" value="{{ $order->quantity }}">
                    </div>
                    
                    <label for="amount" class="col-sm-2 col-form-label">Amount</label>
                    <div class="col-sm-10">
                        <p class="mt-1">: {{ $order->amount }}</p>
                        <input type="hidden" name="amount" value="{{ $order->amount }}">
                    </div>
                    
                    <label for="name" class="col-sm-2 col-form-label">Customer</label>
                    <div class="col-sm-10">
                        <p class="mt-1">: {{ $order->name }} / {{ $order->hp }}</p>
                        <input type="hidden" name="name" value="{{ $order->name }}">
                        <input type="hidden" name="hp" value="{{ $order->hp }}">
                    </div>

                    <label for="address" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                        <p class="mt-1">: {{ $order->address }}</p>
                        <input type="hidden" name="address" value="{{ $order->address }}">
                    </div>

                </div>

                <button type="submit" class="btn btn-success btn-block">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection