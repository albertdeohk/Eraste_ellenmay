@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <form action="{{ route('product.store') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="product_name">Nama Produk</label>
                    <input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror" value="{{ old('product_name') }}">
                        
                    @error('product_name')
                    <p class="text-danger">
                        <strong>{{ $message }}</strong>
                    </p>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="price">Harga</label>
                    <input type="number" name="price"class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
                        
                    @error('price')
                    <p class="text-danger">
                        <strong>{{ $message }}</strong>
                    </p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success btn-block">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection