@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card mb-4">
                <div class="card-body">
                    <p>{{ $product->id }} - {{ $product->name }}</p>
                    <p>Harga Rp{{ number_format($product->price,'0','','.') }}</p>
                    <p>Qty 1 pcs</p>
                    <hr>

                    <h5>Customer Information</h5>
                    <form action="{{ route('_order.create', $product->id) }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="name">Nama Pemesan</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                
                            @error('name')
                            <p class="text-danger">
                                <strong>{{ $message }}</strong>
                            </p>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="hp">Nomor HP</label>
                            <input type="text" name="hp" class="form-control @error('hp') is-invalid @enderror"  value="{{ old('hp') }}">
                                
                            @error('hp')
                            <p class="text-danger">
                                <strong>{{ $message }}</strong>
                            </p>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="address">Alamat</label>
                            <textarea name="address" class="form-control">{{ old('address') }}</textarea>
                                
                            @error('address')
                            <p class="text-danger">
                                <strong>{{ $message }}</strong>
                            </p>
                            @enderror
                        </div>

                        <input type="hidden" name="quantity" value="1">
                        <input type="hidden" name="amount" value="{{ $product->price }}">
                        <button type="submit" class="btn btn-success btn-block">Beli</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection