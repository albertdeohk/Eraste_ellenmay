@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4 class="my-3">Data Pengguna</h4>
            <table class="table table-bordered" id="table-user">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Aksi</th>
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
        $('#table-user').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('user.datatable') }}",
            columns: [{
                data: 'name',
                name: 'name',
            },{
                data: 'email',
                name: 'email',
            },{
                data: 'roles',
                name: 'roles',
            },{
                data: 'action',
                name: 'action',
            }]
        });
    } );
</script>
@endpush