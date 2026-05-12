@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-coffee text-white">
            <h3 class="mb-0"><i class="fas fa-users"></i> Customers</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="customers-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Total Orders</th>
                        <th>Total Spent</th>
                        <th>Joined Date</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(function() {
    $('#customers-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route("admin.customers.data") }}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'orders_count', name: 'orders_count' },
            { data: 'total_spent', name: 'total_spent' },
            { data: 'created_at', name: 'created_at' }
        ]
    });
});
</script>
@endpush