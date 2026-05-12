

<?php $__env->startSection('content'); ?>
<div class="container-fluid my-4">
    <div class="card">
        <div class="card-header bg-coffee text-white">
            <h3 class="mb-0">Order Items - Order #<?php echo e($order->order_number); ?></h3>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5>Customer Information</h5>
                    <p><strong>Name:</strong> <?php echo e($order->user->name); ?><br>
                    <strong>Email:</strong> <?php echo e($order->user->email); ?><br>
                    <strong>Phone:</strong> <?php echo e($order->phone); ?></p>
                </div>
                <div class="col-md-6">
                    <h5>Shipping Address</h5>
                    <p><?php echo e($order->shipping_address); ?><br>
                    <?php echo e($order->city); ?>, <?php echo e($order->postal_code); ?></p>
                </div>
            </div>
            
            <h5>Order Items</h5>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($item->product->name); ?></td>
                            <td>₨ <?php echo e(number_format($item->price, 2)); ?></td>
                            <td><?php echo e($item->quantity); ?></td>
                            <td>₨ <?php echo e(number_format($item->price * $item->quantity, 2)); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3" class="text-end">Total:</th>
                            <th>₨ <?php echo e(number_format($order->total_amount, 2)); ?></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            
            <div class="mt-3">
                <a href="<?php echo e(route('admin.orders')); ?>" class="btn btn-secondary">Back to Orders</a>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-coffee {
        background: #2c1810 !important;
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Shahbaz Computers\coffee-shop\resources\views/admin/order-items.blade.php ENDPATH**/ ?>