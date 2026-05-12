

<?php $__env->startSection('content'); ?>
<div class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center mb-4">Checkout</h1>
            
            <?php if(empty($cart) || count($cart) == 0): ?>
                <div class="alert alert-info text-center">
                    <i class="fas fa-shopping-cart fa-3x mb-3"></i>
                    <h4>Your cart is empty!</h4>
                    <a href="<?php echo e(route('products')); ?>" class="btn btn-coffee mt-3">Shop Now</a>
                </div>
            <?php else: ?>
                <div class="row">
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-header bg-coffee text-white">
                                <h4 class="mb-0">Shipping Information</h4>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo e(route('checkout.store')); ?>" method="POST" id="checkoutForm">
                                    <?php echo csrf_field(); ?>
                                    
                                    <div class="mb-3">
                                        <label for="shipping_address" class="form-label">Shipping Address *</label>
                                        <textarea class="form-control <?php $__errorArgs = ['shipping_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                  id="shipping_address" name="shipping_address" rows="3" required><?php echo e(old('shipping_address')); ?></textarea>
                                        <?php $__errorArgs = ['shipping_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="city" class="form-label">City *</label>
                                            <input type="text" class="form-control <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                   id="city" name="city" value="<?php echo e(old('city')); ?>" required>
                                            <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="postal_code" class="form-label">Postal Code *</label>
                                            <input type="text" class="form-control <?php $__errorArgs = ['postal_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                                   id="postal_code" name="postal_code" value="<?php echo e(old('postal_code')); ?>" required>
                                            <?php $__errorArgs = ['postal_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone Number *</label>
                                        <input type="text" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                               id="phone" name="phone" value="<?php echo e(old('phone')); ?>" required>
                                        <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Payment Method *</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="payment_method" 
                                                   id="cash" value="cash" checked>
                                            <label class="form-check-label" for="cash">
                                                <i class="fas fa-money-bill"></i> Cash on Delivery
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="payment_method" 
                                                   id="card" value="card">
                                            <label class="form-check-label" for="card">
                                                <i class="fas fa-credit-card"></i> Credit/Debit Card
                                            </label>
                                        </div>
                                        <?php $__errorArgs = ['payment_method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header bg-coffee text-white">
                                <h4 class="mb-0">Order Summary</h4>
                            </div>
                            <div class="card-body">
                                <?php $total = 0; ?>
                                <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; ?>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span><?php echo e($item['name']); ?> x <?php echo e($item['quantity']); ?></span>
                                        <span>₨ <?php echo e(number_format($subtotal, 2)); ?></span>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                                <hr>
                                
                                <div class="d-flex justify-content-between mb-2">
                                    <strong>Subtotal:</strong>
                                    <strong>₨ <?php echo e(number_format($total, 2)); ?></strong>
                                </div>
                                
                                <div class="d-flex justify-content-between mb-2">
                                    <span>Delivery Charges:</span>
                                    <span class="text-success">Free</span>
                                </div>
                                
                                <hr>
                                
                                <div class="d-flex justify-content-between mb-3">
                                    <h5>Total:</h5>
                                    <h5 class="text-coffee">₨ <?php echo e(number_format($total, 2)); ?></h5>
                                </div>
                                
                                <button type="submit" form="checkoutForm" class="btn btn-coffee w-100 btn-lg">
                                    <i class="fas fa-check-circle"></i> Place Order
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
    .bg-coffee {
        background: #2c1810 !important;
    }
    .text-coffee {
        color: #6f4e37;
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
        color: white;
    }
    .card {
        border: none;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
        border-radius: 15px;
        overflow: hidden;
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Shahbaz Computers\coffee-shop\resources\views/frontend/checkout.blade.php ENDPATH**/ ?>