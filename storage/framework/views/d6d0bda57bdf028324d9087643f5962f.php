<?php $__env->startSection('content'); ?>
<div class="container-fluid px-0">
    
    
    <div class="hero-section text-center py-5" style="background: linear-gradient(135deg, #2c1810 0%, #5a3a2a 100%); min-height: 400px; display: flex; align-items: center;">
        <div class="container">
            <h1 class="display-3 fw-bold text-white mb-3">
                Welcome to <span style="color: #d4a373;">Brew Haven</span>
            </h1>
            <p class="lead text-white-50 mb-4">
                Experience the finest coffee crafted with passion and precision
            </p>
            <a href="<?php echo e(route('products')); ?>" class="btn btn-light btn-lg px-5 py-3 rounded-pill fw-bold">
                Shop Now 🛒
            </a>
        </div>
    </div>

    
    <div class="container my-5">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold" style="color: #2c1810;">Featured Products</h2>
            <p class="text-muted">Our most popular coffee selections</p>
            <div class="border-bottom border-2 border-warning mx-auto" style="width: 80px;"></div>
        </div>

        <div class="row g-4">
            <?php $__currentLoopData = $featuredProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 col-lg-4">
                <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                    
                    <div class="position-relative" style="height: 260px; overflow: hidden;">

                        
                        <?php
    $images = [
        'https://images.pexels.com/photos/312418/pexels-photo-312418.jpeg',
        'https://images.pexels.com/photos/374885/pexels-photo-374885.jpeg',
        'https://images.pexels.com/photos/302899/pexels-photo-302899.jpeg',
        'https://images.pexels.com/photos/851555/pexels-photo-851555.jpeg',
        'https://images.pexels.com/photos/683039/pexels-photo-683039.jpeg',
        'https://images.pexels.com/photos/2074130/pexels-photo-2074130.jpeg',
    ];

    // safe index (always works)
    $index = ($loop->index ?? 0) % count($images);

    $image = $product->image 
        ? asset('images/' . $product->image)
        : $images[$index];
?>

<img src="<?php echo e($image); ?>" 
     class="w-100 h-100" 
     alt="<?php echo e($product->name); ?>"
     style="object-fit: cover;">
                        <?php if($product->sale_price): ?>
                            <span class="position-absolute top-0 end-0 bg-danger text-white px-3 py-1 m-3 rounded-pill small fw-bold">
                                Sale!
                            </span>
                        <?php endif; ?>

                    </div>

                    <div class="card-body text-center p-4">
                        <h5 class="card-title fw-bold" style="color: #2c1810;">
                            <?php echo e($product->name); ?>

                        </h5>

                        <p class="card-text text-muted small">
                            <?php echo e(Str::limit($product->description, 80)); ?>

                        </p>

                        <div class="mb-3">
                            <?php if($product->sale_price): ?>
                                <span class="text-decoration-line-through text-muted me-2">
                                    Rs <?php echo e(number_format($product->price, 2)); ?>

                                </span>
                                <span class="fw-bold fs-4" style="color: #d4a373;">
                                    Rs <?php echo e(number_format($product->sale_price, 2)); ?>

                                </span>
                            <?php else: ?>
                                <span class="fw-bold fs-4" style="color: #d4a373;">
                                    Rs <?php echo e(number_format($product->price, 2)); ?>

                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="d-flex gap-2">
                            <button class="btn btn-dark flex-grow-1 add-to-cart rounded-pill" 
                                    data-id="<?php echo e($product->id); ?>">
                                🛒 Add to Cart
                            </button>
                            <a href="#" class="btn btn-outline-dark rounded-pill px-3">
                                View
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="text-center mt-5">
            <a href="<?php echo e(route('products')); ?>" class="btn btn-coffee btn-lg px-5 py-3 rounded-pill fw-bold">
                View All Products →
            </a>
        </div>
    </div>
</div>

<style>
    .btn-coffee {
        background: #2c1810;
        color: white;
        border: none;
        transition: all 0.3s;
    }
    .btn-coffee:hover {
        background: #5a3a2a;
        transform: translateY(-2px);
        color: white;
    }
    .card:hover img {
        transform: scale(1.05);
    }
    .card {
        transition: all 0.3s;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
    }
    .hero-section {
        border-radius: 0 0 30px 30px;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
$(document).ready(function() {
    $('.add-to-cart').click(function() {
        let productId = $(this).data('id');
        let button = $(this);
        
        button.html('<span class="spinner-border spinner-border-sm me-1"></span> Adding...').prop('disabled', true);
        
        $.ajax({
            url: '<?php echo e(route("cart.add")); ?>',
            method: 'POST',
            data: {
                product_id: productId,
                _token: '<?php echo e(csrf_token()); ?>'
            },
            success: function(response) {
                if(response.success) {
                    button.html('✓ Added!');
                    setTimeout(() => {
                        button.html('🛒 Add to Cart').prop('disabled', false);
                    }, 2000);

                    let count = parseInt($('.cart-count').text() || '0');
                    $('.cart-count').text(count + 1);
                }
            },
            error: function() {
                button.html('🛒 Add to Cart').prop('disabled', false);
                alert('Error adding to cart');
            }
        });
    });
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Shahbaz Computers\coffee-shop\resources\views/home.blade.php ENDPATH**/ ?>