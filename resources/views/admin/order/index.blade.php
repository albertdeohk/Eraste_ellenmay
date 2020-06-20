@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4>Transaksi</h4>
            <table class="table table-bordered" id="order_table">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th style="width: 60px">Amount</th>
                        <th style="width: 200px">Customer Name</th>
                        <th style="width: 200px">Address</th>
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
        $('#order_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('order.datatable') }}",
            columns: [{
                data: 'product_code',
                name: 'product_code',
            },{
                data: 'quantity',
                name: 'quantity',
            },{
                data: 'amount',
                name: 'amount',
            },{
                data: 'name',
                name: 'name',
            },{
                data: 'address',
                name: 'address',
            },{
                data: 'action',
                name: 'action',
            }]
        });
    } );
</script>
@endpush