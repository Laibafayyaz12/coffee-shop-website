@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-coffee text-white">
            <h3 class="mb-0"><i class="fas fa-shopping-cart"></i> Manage Orders</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="orders-table">
                <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Customer</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Payment Method</th>
                        <th>Date</th>
                        <th>Action</th>
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
    $('#orders-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route("admin.orders.data") }}',
        columns: [
            { data: 'order_number', name: 'order_number' },
            { data: 'user.name', name: 'user.name' },
            { data: 'total_amount', name: 'total_amount' },
            { data: 'status', name: 'status' },
            { data: 'payment_method', name: 'payment_method' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
    
    $(document).on('change', '.status-update', function() {
        let orderId = $(this).data('id');
        let status = $(this).val();
        
        $.ajax({
            url: '{{ route("admin.update-order-status") }}',
            method: 'POST',
            data: {
                order_id: orderId,
                status: status,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if(response.success) {
                    alert('Order status updated successfully!');
                }
            }
        });
    });
});
</script>
@endpush