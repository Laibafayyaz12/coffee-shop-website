

<?php $__env->startSection('content'); ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
$(function() {
    $('#orders-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '<?php echo e(route("admin.orders.data")); ?>',
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
            url: '<?php echo e(route("admin.update-order-status")); ?>',
            method: 'POST',
            data: {
                order_id: orderId,
                status: status,
                _token: '<?php echo e(csrf_token()); ?>'
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
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Shahbaz Computers\coffee-shop\resources\views/admin/orders.blade.php ENDPATH**/ ?>