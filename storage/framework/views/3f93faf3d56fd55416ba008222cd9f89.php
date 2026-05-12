

<?php $__env->startSection('content'); ?>
<div class="container my-5">
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body p-0">
                    <?php if($product->image): ?>
                        <img src="<?php echo e(asset('storage/'.$product->image)); ?>" class="img-fluid rounded" alt="<?php echo e($product->name); ?>">
                    <?php else: ?>
                        <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?w=500&h=500&fit=crop" class="img-fluid rounded" alt="<?php echo e($product->name); ?>">
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <span class="badge bg-coffee mb-3"><?php echo e($product->category); ?></span>
                    <h1 class="card-title"><?php echo e($product->name); ?></h1>
                    
                    <div class="product-price mb-3">
                        <?php if($product->sale_price): ?>
                            <span class="original-price h4">₨ <?php echo e(number_format($product->price, 2)); ?></span>
                            <span class="sale-price h3 text-coffee">₨ <?php echo e(number_format($product->sale_price, 2)); ?></span>
                            <span class="badge bg-success ms-2">Save ₨ <?php echo e(number_format($product->price - $product->sale_price, 2)); ?></span>
                        <?php else: ?>
                            <h2 class="text-coffee">₨ <?php echo e(number_format($product->price, 2)); ?></h2>
                        <?php endif; ?>
                    </div>
                    
                    <div class="mb-3">
                        <h5>Description</h5>
                        <p class="text-muted"><?php echo e($product->description); ?></p>
                    </div>
                    
                    <div class="mb-3">
                        <h5>Availability</h5>
                        <?php if($product->stock > 0): ?>
                            <span class="text-success"><i class="fas fa-check-circle"></i> In Stock (<?php echo e($product->stock); ?> units)</span>
                        <?php else: ?>
                            <span class="text-danger"><i class="fas fa-times-circle"></i> Out of Stock</span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label">Quantity</label>
                            <input type="number" id="quantity" class="form-control" value="1" min="1" max="<?php echo e($product->stock); ?>" <?php echo e($product->stock == 0 ? 'disabled' : ''); ?>>
                        </div>
                    </div>
                    
                    <div class="d-grid gap-2">
                        <button class="btn btn-coffee btn-lg add-to-cart" data-id="<?php echo e($product->id); ?>" <?php echo e($product->stock == 0 ? 'disabled' : ''); ?>>
                            <i class="fas fa-cart-plus"></i> Add to Cart
                        </button>
                        <button class="btn btn-outline-coffee btn-lg buy-now" data-id="<?php echo e($product->id); ?>">
                            <i class="fas fa-bolt"></i> Buy Now
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php if($relatedProducts->count() > 0): ?>
    <div class="mt-5">
        <h3 class="section-title text-center mb-4">Related Products You May Like</h3>
        <div class="row">
            <?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-mug-hot fa-3x text-coffee mb-3"></i>
                        <h5 class="card-title"><?php echo e($related->name); ?></h5>
                        <p class="product-price">₨ <?php echo e(number_format($related->price, 2)); ?></p>
                        <a href="<?php echo e(route('product.detail', $related->slug)); ?>" class="btn btn-sm btn-outline-coffee">View Product</a>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .bg-coffee {
        background: #6f4e37;
        color: white;
    }
    
    .text-coffee {
        color: #6f4e37;
    }
    
    .product-price {
        padding: 10px 0;
    }
    
    .original-price {
        text-decoration: line-through;
        color: #999;
    }
    
    .sale-price {
        color: #d4a373;
        font-weight: bold;
    }
    
    .section-title {
        position: relative;
        display: inline-block;
        margin-bottom: 2rem;
    }
    
    .section-title:after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 50px;
        height: 3px;
        background: #d4a373;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
$(document).ready(function() {
    $('.add-to-cart').click(function() {
        let productId = $(this).data('id');
        let quantity = $('#quantity').val() || 1;
        let button = $(this);
        
        button.html('<i class="fas fa-spinner fa-spin"></i> Adding...').prop('disabled', true);
        
        $.ajax({
            url: '<?php echo e(route("cart.add")); ?>',
            method: 'POST',
            data: {
                product_id: productId,
                quantity: quantity,
                _token: '<?php echo e(csrf_token()); ?>'
            },
            success: function(response) {
                if(response.success) {
                    button.html('<i class="fas fa-check"></i> Added!');
                    setTimeout(() => {
                        button.html('<i class="fas fa-cart-plus"></i> Add to Cart').prop('disabled', false);
                    }, 2000);
                    
                    let count = parseInt($('.cart-count').text() || '0');
                    $('.cart-count').text(count + parseInt(quantity));
                    
                    $('<div class="alert alert-success alert-dismissible fade show position-fixed top-0 end-0 m-3" style="z-index: 9999;">' +
                        '<i class="fas fa-check-circle"></i> Product added to cart!' +
                        '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>' +
                        '</div>').appendTo('body').delay(3000).fadeOut();
                }
            },
            error: function() {
                button.html('<i class="fas fa-cart-plus"></i> Add to Cart').prop('disabled', false);
                alert('Error adding to cart. Please try again.');
            }
        });
    });
    
    $('.buy-now').click(function() {
        let productId = $(this).data('id');
        let quantity = $('#quantity').val() || 1;
        
        $.ajax({
            url: '<?php echo e(route("cart.add")); ?>',
            method: 'POST',
            data: {
                product_id: productId,
                quantity: quantity,
                _token: '<?php echo e(csrf_token()); ?>'
            },
            success: function(response) {
                if(response.success) {
                    window.location.href = '<?php echo e(route("checkout")); ?>';
                }
            }
        });
    });
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Shahbaz Computers\coffee-shop\resources\views/frontend/product-detail.blade.php ENDPATH**/ ?>