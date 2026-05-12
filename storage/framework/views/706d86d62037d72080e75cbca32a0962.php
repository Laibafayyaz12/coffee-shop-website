

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-coffee text-white">
                    <h3 class="mb-0"><i class="fas fa-chart-line"></i> Admin Dashboard</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <div class="card text-white bg-primary">
                                <div class="card-body">
                                    <h5 class="card-title">Total Orders</h5>
                                    <h2><?php echo e($totalOrders ?? 0); ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card text-white bg-success">
                                <div class="card-body">
                                    <h5 class="card-title">Total Products</h5>
                                    <h2><?php echo e($totalProducts ?? 0); ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card text-white bg-info">
                                <div class="card-body">
                                    <h5 class="card-title">Total Customers</h5>
                                    <h2><?php echo e($totalCustomers ?? 0); ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card text-white bg-warning">
                                <div class="card-body">
                                    <h5 class="card-title">Total Revenue</h5>
                                    <h2>₨ <?php echo e(number_format($totalRevenue ?? 0, 2)); ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-3 mb-3">
                            <a href="<?php echo e(route('admin.products')); ?>" class="btn btn-coffee w-100 py-3">
                                <i class="fas fa-box"></i> Manage Products
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="<?php echo e(route('admin.orders')); ?>" class="btn btn-coffee w-100 py-3">
                                <i class="fas fa-shopping-cart"></i> Manage Orders
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="<?php echo e(route('admin.customers')); ?>" class="btn btn-coffee w-100 py-3">
                                <i class="fas fa-users"></i> View Customers
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="<?php echo e(route('admin.contacts')); ?>" class="btn btn-coffee w-100 py-3">
                                <i class="fas fa-envelope"></i> Contact Messages
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-coffee {
        background: #2c1810 !important;
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
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Shahbaz Computers\coffee-shop\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>