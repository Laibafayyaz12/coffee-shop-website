

<?php $__env->startSection('content'); ?>
<div class="container my-5">
    <div class="row">
        <div class="col-md-12 text-center mb-5">
            <h1 class="section-title">Our Coffee Collection</h1>
            <p class="text-muted">Discover our range of premium coffee blends</p>
        </div>
    </div>
    
    <div class="row">
        <!-- Sidebar with categories -->
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-coffee text-white">
                    <h5 class="mb-0"><i class="fas fa-filter"></i> Categories</h5>
                </div>
                <div class="card-body p-0">
                    <ul class="list-unstyled mb-0">
                        <li class="border-bottom">
                            <a href="<?php echo e(route('products')); ?>" class="d-block p-3 text-dark text-decoration-none hover-bg">
                                <i class="fas fa-coffee"></i> All Products
                            </a>
                        </li>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="border-bottom">
                            <a href="?category=<?php echo e($category); ?>" class="d-block p-3 text-dark text-decoration-none hover-bg">
                                <i class="fas fa-mug-hot"></i> <?php echo e($category); ?>

                            </a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- Products Grid -->
        <div class="col-md-9">
            <div class="row">
                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <!-- Product Image - FIXED CODE -->
                        <div class="card-img-wrapper">
                            <?php
                                // Check if image exists and is valid
                                $hasImage = false;
                                if($product->image && $product->image != 'null' && $product->image != '' && $product->image != 'NULL') {
                                    $hasImage = true;
                                }
                            ?>
                            
                            <?php if($hasImage): ?>
                                <img src="<?php echo e(asset($product->image)); ?>" 
                                     class="card-img-top" 
                                     alt="<?php echo e($product->name); ?>"
                                     style="height: 200px; width: 100%; object-fit: cover;"
                                     onerror="this.src='https://images.pexels.com/photos/312418/pexels-photo-312418.jpeg?w=400&h=300&fit=crop'">
                     <?php else: ?>
<?php
    $defaultImages = [
    1 => 'https://images.pexels.com/photos/312418/pexels-photo-312418.jpeg',
    2 => 'https://images.pexels.com/photos/374885/pexels-photo-374885.jpeg',
    3 => 'https://images.pexels.com/photos/302899/pexels-photo-302899.jpeg',
    4 => 'https://images.pexels.com/photos/851555/pexels-photo-851555.jpeg',
    5 => 'https://images.pexels.com/photos/683039/pexels-photo-683039.jpeg',
    6 => 'https://images.pexels.com/photos/2074130/pexels-photo-2074130.jpeg',
];

    $defaultImage = $defaultImages[$product->id] 
        ?? 'https://images.pexels.com/photos/312418/pexels-photo-312418.jpeg';
?>

<img src="<?php echo e($defaultImage); ?>" 
     class="card-img-top" 
     alt="<?php echo e($product->name); ?>"
     style="height: 200px; width: 100%; object-fit: cover;">
<?php endif; ?>
                            
                            <?php if($product->sale_price): ?>
                                <span class="sale-badge">Sale!</span>
                            <?php endif; ?>
                        </div>
                        
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <span class="badge bg-coffee"><?php echo e($product->category); ?></span>
                                <?php if($product->stock < 10): ?>
                                    <span class="badge bg-warning">Only <?php echo e($product->stock); ?> left</span>
                                <?php endif; ?>
                            </div>
                            <h5 class="card-title"><?php echo e($product->name); ?></h5>
                            <p class="card-text text-muted small"><?php echo e(Str::limit($product->description, 80)); ?></p>
                            <div class="product-price mt-2">
                                <?php if($product->sale_price): ?>
                                    <span class="original-price">₨ <?php echo e(number_format($product->price, 2)); ?></span>
                                    <span class="sale-price">₨ <?php echo e(number_format($product->sale_price, 2)); ?></span>
                                <?php else: ?>
                                    <span class="current-price">₨ <?php echo e(number_format($product->price, 2)); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                            <button class="btn btn-coffee w-100 add-to-cart" data-id="<?php echo e($product->id); ?>">
                                <i class="fas fa-cart-plus"></i> Add to Cart
                            </button>
                            <a href="<?php echo e(route('product.detail', $product->slug)); ?>" class="btn btn-outline-coffee w-100 mt-2">
                                <i class="fas fa-eye"></i> View Details
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-12">
                    <div class="alert alert-info text-center">No products found in this category.</div>
                </div>
                <?php endif; ?>
            </div>
            
            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                <?php echo e($products->links()); ?>

            </div>
        </div>
    </div>
</div>

<style>
    .bg-coffee {
        background: linear-gradient(135deg, #2c1810 0%, #5a3a2a 100%);
        color: white;
    }
    
    .card-img-wrapper {
        position: relative;
        overflow: hidden;
        height: 200px;
        background: #f8f5f0;
    }
    
    .card-img-top {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }
    
    .card:hover .card-img-top {
        transform: scale(1.05);
    }
    
    .sale-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        background: #ff4444;
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 12px;
        font-weight: bold;
        z-index: 1;
    }
    
    .hover-bg:hover {
        background: #f8f5f0;
        padding-left: 20px !important;
        transition: all 0.3s;
    }
    
    .product-price {
        font-size: 1.1rem;
        font-weight: bold;
    }
    
    .original-price {
        text-decoration: line-through;
        color: #999;
        font-size: 0.9rem;
        margin-right: 10px;
    }
    
    .sale-price, .current-price {
        color: #d4a373;
        font-size: 1.2rem;
    }
    
    .btn-coffee {
        background: #6f4e37;
        color: white;
        border: none;
        transition: all 0.3s;
    }
    
    .btn-coffee:hover {
        background: #5a3a2a;
        transform: translateY(-2px);
    }
    
    .btn-outline-coffee {
        border: 2px solid #6f4e37;
        color: #6f4e37;
        background: transparent;
    }
    
    .btn-outline-coffee:hover {
        background: #6f4e37;
        color: white;
    }
    
    .section-title {
        position: relative;
        display: inline-block;
        margin-bottom: 1rem;
    }
    
    .section-title:after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 3px;
        background: #d4a373;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
$(document).ready(function() {
    $('.add-to-cart').click(function() {
        let productId = $(this).data('id');
        let button = $(this);
        
        button.html('<i class="fas fa-spinner fa-spin"></i> Adding...').prop('disabled', true);
        
        $.ajax({
            url: '<?php echo e(route("cart.add")); ?>',
            method: 'POST',
            data: {
                product_id: productId,
                _token: '<?php echo e(csrf_token()); ?>'
            },
            success: function(response) {
                if(response.success) {
                    button.html('<i class="fas fa-check"></i> Added!');
                    setTimeout(() => {
                        button.html('<i class="fas fa-cart-plus"></i> Add to Cart').prop('disabled', false);
                    }, 2000);
                    
                    // Update cart count
                    let count = parseInt($('.cart-count').text() || '0');
                    $('.cart-count').text(count + 1);
                    
                    // Show success toast
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
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Shahbaz Computers\coffee-shop\resources\views/frontend/products.blade.php ENDPATH**/ ?>