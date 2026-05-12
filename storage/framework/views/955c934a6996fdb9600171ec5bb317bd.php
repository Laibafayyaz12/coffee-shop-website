

<?php $__env->startSection('content'); ?>
<div class="container my-5">
    
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold">☕ Our Coffee Collection</h1>
        <p class="lead text-muted">Discover our range of premium coffee blends</p>
        <div class="border-bottom border-warning mx-auto" style="width: 80px;"></div>
    </div>

    <div class="row g-4">
        
        
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow border-0 rounded-4 overflow-hidden">
                <img src="https://images.pexels.com/photos/312418/pexels-photo-312418.jpeg?w=500&h=350&fit=crop" 
                     class="card-img-top" alt="Espresso"
                     style="height: 220px; width: 100%; object-fit: cover;">
                <div class="card-body">
                    <h5 class="text-warning mb-2">Espresso</h5>
                    <h4>Classic Espresso</h4>
                    <p class="text-muted">Rich and bold single-origin espresso shot with crema topping.</p>
                    <h4 class="text-success mt-3">Rs 250.00</h4>
                    <div class="d-flex gap-2 mt-3">
                        <button class="btn btn-success flex-grow-1 add-to-cart" data-id="1">Add to Cart</button>
                        <a href="<?php echo e(url('/product/classic-espresso')); ?>" class="btn btn-outline-secondary">View Details</a>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow border-0 rounded-4 overflow-hidden">
                <img src="https://images.pexels.com/photos/2257649/pexels-photo-2257649.jpeg?w=500&h=350&fit=crop" 
                     class="card-img-top" alt="Caramel Latte"
                     style="height: 220px; width: 100%; object-fit: cover;">
                <div class="card-body">
                    <h5 class="text-warning mb-2">Latte</h5>
                    <h4>Caramel Latte</h4>
                    <p class="text-muted">Smooth espresso latte with sweet caramel syrup, topped with whipped cream.</p>
                    <div class="mt-3">
                        <span class="text-decoration-line-through text-muted me-2">Rs 450.00</span>
                        <h4 class="text-success d-inline">Rs 399.00</h4>
                    </div>
                    <div class="d-flex gap-2 mt-3">
                        <button class="btn btn-success flex-grow-1 add-to-cart" data-id="2">Add to Cart</button>
                        <a href="<?php echo e(url('/product/caramel-latte')); ?>" class="btn btn-outline-secondary">View Details</a>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow border-0 rounded-4 overflow-hidden">
                <img src="https://images.pexels.com/photos/2668513/pexels-photo-2668513.jpeg?w=500&h=350&fit=crop" 
                     class="card-img-top" alt="Mocha Frappe"
                     style="height: 220px; width: 100%; object-fit: cover;">
                <div class="card-body">
                    <h5 class="text-warning mb-2">Cold Coffee</h5>
                    <h4>Mocha Frappe</h4>
                    <p class="text-muted">Chilled coffee blended with chocolate, ice, and topped with whipped cream.</p>
                    <h4 class="text-success mt-3">Rs 550.00</h4>
                    <div class="d-flex gap-2 mt-3">
                        <button class="btn btn-success flex-grow-1 add-to-cart" data-id="3">Add to Cart</button>
                        <a href="<?php echo e(url('/product/mocha-frappe')); ?>" class="btn btn-outline-secondary">View Details</a>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow border-0 rounded-4 overflow-hidden">
                <img src="https://images.pexels.com/photos/324574/pexels-photo-324574.jpeg?w=500&h=350&fit=crop" 
                     class="card-img-top" alt="Vanilla Cold Brew"
                     style="height: 220px; width: 100%; object-fit: cover;">
                <div class="card-body">
                    <h5 class="text-warning mb-2">Cold Brew</h5>
                    <h4>Vanilla Cold Brew</h4>
                    <p class="text-muted">Smooth cold brew coffee steeped for 12 hours with natural vanilla essence.</p>
                    <div class="mt-3">
                        <span class="text-decoration-line-through text-muted me-2">Rs 500.00</span>
                        <h4 class="text-success d-inline">Rs 450.00</h4>
                    </div>
                    <div class="d-flex gap-2 mt-3">
                        <button class="btn btn-success flex-grow-1 add-to-cart" data-id="4">Add to Cart</button>
                        <a href="<?php echo e(url('/product/vanilla-cold-brew')); ?>" class="btn btn-outline-secondary">View Details</a>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow border-0 rounded-4 overflow-hidden">
                <img src="https://images.pexels.com/photos/3020919/pexels-photo-3020919.jpeg?w=500&h=350&fit=crop" 
                     class="card-img-top" alt="Hazelnut Cappuccino"
                     style="height: 220px; width: 100%; object-fit: cover;">
                <div class="card-body">
                    <h5 class="text-warning mb-2">Cappuccino</h5>
                    <h4>Hazelnut Cappuccino</h4>
                    <p class="text-muted">Creamy cappuccino with hazelnut flavor and cinnamon dusting.</p>
                    <h4 class="text-success mt-3">Rs 480.00</h4>
                    <div class="d-flex gap-2 mt-3">
                        <button class="btn btn-success flex-grow-1 add-to-cart" data-id="5">Add to Cart</button>
                        <a href="<?php echo e(url('/product/hazelnut-cappuccino')); ?>" class="btn btn-outline-secondary">View Details</a>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="col-md-6 col-lg-4">
            <div class="card h-100 shadow border-0 rounded-4 overflow-hidden">
                <img src="https://images.pexels.com/photos/3406444/pexels-photo-3406444.jpeg?w=500&h=350&fit=crop" 
                     class="card-img-top" alt="Turkish Coffee"
                     style="height: 220px; width: 100%; object-fit: cover;">
                <div class="card-body">
                    <h5 class="text-warning mb-2">Traditional</h5>
                    <h4>Turkish Coffee</h4>
                    <p class="text-muted">Traditional Turkish coffee, finely ground and brewed to perfection.</p>
                    <div class="mt-3">
                        <span class="text-decoration-line-through text-muted me-2">Rs 300.00</span>
                        <h4 class="text-success d-inline">Rs 280.00</h4>
                    </div>
                    <div class="d-flex gap-2 mt-3">
                        <button class="btn btn-success flex-grow-1 add-to-cart" data-id="6">Add to Cart</button>
                        <a href="<?php echo e(url('/product/turkish-coffee')); ?>" class="btn btn-outline-secondary">View Details</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    .card {
        transition: transform 0.3s;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15) !important;
    }
    .card-img-top {
        transition: transform 0.3s;
    }
    .card:hover .card-img-top {
        transform: scale(1.05);
    }
    .btn-success {
        background-color: #6f4e37;
        border-color: #6f4e37;
    }
    .btn-success:hover {
        background-color: #5a3a2a;
        border-color: #5a3a2a;
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
                        button.html('Add to Cart').prop('disabled', false);
                    }, 2000);
                    
                    let count = parseInt($('.cart-count').text() || '0');
                    $('.cart-count').text(count + 1);
                }
            },
            error: function() {
                button.html('Add to Cart').prop('disabled', false);
                alert('Error adding to cart');
            }
        });
    });
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Shahbaz Computers\coffee-shop\resources\views/frontend/home.blade.php ENDPATH**/ ?>