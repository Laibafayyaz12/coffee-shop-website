

<?php $__env->startSection('content'); ?>
<div class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center mb-4">Shopping Cart</h1>
            
            <?php if(empty($cart) || count($cart) == 0): ?>
                <div class="alert alert-info text-center">
                    <i class="fas fa-shopping-cart fa-3x mb-3"></i>
                    <h4>Your cart is empty!</h4>
                    <p>Looks like you haven't added any items to your cart yet.</p>
                    <a href="<?php echo e(route('products')); ?>" class="btn btn-coffee mt-3">
                        <i class="fas fa-shopping-bag"></i> Continue Shopping
                    </a>
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0; ?>
                            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php 
                                    $subtotal = $item['price'] * $item['quantity']; 
                                    $total += $subtotal;
                                ?>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <?php if(isset($item['image']) && $item['image']): ?>
                                                <img src="<?php echo e(asset('storage/'.$item['image'])); ?>" width="50" height="50" class="me-3 rounded" alt="<?php echo e($item['name']); ?>">
                                            <?php else: ?>
                                                <i class="fas fa-mug-hot fa-2x me-3 text-coffee"></i>
                                            <?php endif; ?>
                                            <div>
                                                <strong><?php echo e($item['name']); ?></strong>
                                            </div>
                                        </div>
                                    </td>
                                    <td>₨ <?php echo e(number_format($item['price'], 2)); ?></td>
                                    <td>
                                        <input type="number" class="form-control cart-quantity" 
                                               style="width: 80px;" 
                                               data-id="<?php echo e($id); ?>" 
                                               value="<?php echo e($item['quantity']); ?>" 
                                               min="1">
                                    </td>
                                    <td>₨ <?php echo e(number_format($subtotal, 2)); ?></td>
                                    <td>
                                        <button class="btn btn-danger btn-sm remove-item" data-id="<?php echo e($id); ?>">
                                            <i class="fas fa-trash"></i> Remove
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot>
                            <tr class="table-active">
                                <th colspan="3" class="text-end">Total Amount:</th>
                                <th colspan="2">₨ <?php echo e(number_format($total, 2)); ?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                
                <div class="row mt-4">
                    <div class="col-md-6">
                        <a href="<?php echo e(route('products')); ?>" class="btn btn-outline-coffee">
                            <i class="fas fa-arrow-left"></i> Continue Shopping
                        </a>
                    </div>
                    <div class="col-md-6 text-end">
                        <?php if(auth()->guard()->check()): ?>
                            <a href="<?php echo e(route('checkout')); ?>" class="btn btn-coffee btn-lg">
                                <i class="fas fa-credit-card"></i> Proceed to Checkout
                            </a>
                        <?php else: ?>
                            <div class="alert alert-warning">
                                <i class="fas fa-info-circle"></i> Please <a href="<?php echo e(route('login')); ?>">login</a> to proceed with checkout.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
    .text-coffee {
        color: #6f4e37;
    }
    .btn-coffee {
        background: #6f4e37;
        color: white;
        border: none;
        padding: 10px 25px;
        border-radius: 25px;
        transition: all 0.3s;
    }
    .btn-coffee:hover {
        background: #5a3a2a;
        transform: translateY(-2px);
        color: white;
    }
    .btn-outline-coffee {
        border: 2px solid #6f4e37;
        color: #6f4e37;
        background: transparent;
        padding: 10px 25px;
        border-radius: 25px;
        transition: all 0.3s;
    }
    .btn-outline-coffee:hover {
        background: #6f4e37;
        color: white;
    }
    .table th {
        background: #2c1810;
        color: white;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
$(document).ready(function() {
    // Update quantity
    $('.cart-quantity').change(function() {
        let id = $(this).data('id');
        let quantity = $(this).val();
        
        $.ajax({
            url: '<?php echo e(route("cart.update")); ?>',
            method: 'POST',
            data: {
                id: id,
                quantity: quantity,
                _token: '<?php echo e(csrf_token()); ?>'
            },
            success: function(response) {
                if(response.success) {
                    location.reload();
                }
            }
        });
    });
    
    // Remove item
    $('.remove-item').click(function() {
        if(confirm('Are you sure you want to remove this item?')) {
            let id = $(this).data('id');
            
            $.ajax({
                url: '<?php echo e(route("cart.remove")); ?>',
                method: 'POST',
                data: {
                    id: id,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                success: function(response) {
                    if(response.success) {
                        location.reload();
                    }
                }
            });
        }
    });
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Shahbaz Computers\coffee-shop\resources\views/frontend/cart.blade.php ENDPATH**/ ?>