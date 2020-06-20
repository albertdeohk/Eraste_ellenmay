@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($products as $product)
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card mb-1">
                <img class="card-img-top" src="{{ asset('images/images.jpeg') }}" style="height:150px; ">
                <div class="card-body">
                    <h4 class="card-title">{{ $product->id }} - {{ $product->product_name }}</h4>
                    <p class="card-text"> {{ $product->price }}</p>
                    <a href="{{ route('_order.detail',$product->id) }}" class="btn btn-success btn-block">Beli</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
