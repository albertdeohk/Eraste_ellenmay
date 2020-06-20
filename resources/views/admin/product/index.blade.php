@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <a href="{{ route('product.create') }}" class="btn btn-primary my-3">
                Add New Product
            </a>
            <table class="table table-bordered" id="product_table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection

@push('javascript')
<script>
    $(document).ready(function() {
        $('#product_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('product.datatable') }}",
            columns: [{
                data: 'product_name',
                name: 'product_name',
            },{
                data: 'price',
                name: 'price',
            },{
                data: 'action',
                name: 'action',
            }]
        });
    } );
</script>
@endpush