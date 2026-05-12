<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Brew Haven Coffee Shop - Premium Coffee Experience</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background: #fbf7f2;
        }
        
        /* Navbar Styles */
        .navbar {
            background: #2c1810;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            padding: 1rem 0;
        }
        
        .navbar-brand {
            font-size: 1.8rem;
            font-weight: 700;
            color: #f5e6d3 !important;
        }
        
        .navbar-brand i {
            color: #d4a373;
        }
        
        .nav-link {
            color: #f5e6d3 !important;
            font-weight: 500;
            transition: all 0.3s;
            margin: 0 5px;
        }
        
        .nav-link:hover {
            color: #d4a373 !important;
            transform: translateY(-2px);
        }
        
        /* Button Styles */
        .btn-coffee {
            background: linear-gradient(135deg, #6f4e37 0%, #5a3a2a 100%);
            color: white;
            border: none;
            padding: 10px 30px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-coffee:hover {
            background: linear-gradient(135deg, #5a3a2a 0%, #4a2a1a 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(111,78,55,0.3);
            color: white;
        }
        
        .btn-outline-coffee {
            border: 2px solid #6f4e37;
            color: #6f4e37;
            background: transparent;
            border-radius: 25px;
            padding: 8px 25px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-outline-coffee:hover {
            background: #6f4e37;
            color: white;
        }
        
        /* Card Styles */
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: all 0.3s;
            overflow: hidden;
        }
        
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }
        
        .card-img-top {
            height: 250px;
            object-fit: cover;
        }
        
        /* Footer */
        .footer {
            background: #2c1810;
            color: #f5e6d3;
            padding: 50px 0 30px;
            margin-top: 60px;
        }
        
        .footer a {
            color: #f5e6d3;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .footer a:hover {
            color: #d4a373;
            padding-left: 5px;
        }
        
        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, rgba(44,24,16,0.9) 0%, rgba(44,24,16,0.7) 100%), url('https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?ixlib=rb-4.0.3');
            background-size: cover;
            background-position: center;
            height: 600px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
        }
        
        /* Price Styles */
        .product-price {
            font-size: 1.3rem;
            font-weight: bold;
            color: #6f4e37;
        }
        
        .original-price {
            text-decoration: line-through;
            color: #999;
            font-size: 0.9rem;
            margin-right: 10px;
        }
        
        .sale-price {
            color: #d4a373;
            font-size: 1.1rem;
        }
        
        /* Alert Styles */
        .alert-success {
            background: #d4edda;
            border: none;
            border-left: 4px solid #28a745;
            color: #155724;
            border-radius: 10px;
        }
        
        /* Cart Badge */
        .cart-count {
            position: relative;
            top: -8px;
            right: 5px;
            font-size: 0.7rem;
            background: #d4a373;
        }
        
        /* Admin Sidebar */
        .admin-sidebar {
            background: #2c1810;
            min-height: 100vh;
            padding: 20px 0;
        }
        
        .admin-sidebar .nav-link {
            color: #f5e6d3;
            padding: 12px 20px;
            margin: 5px 0;
            border-radius: 10px;
        }
        
        .admin-sidebar .nav-link:hover,
        .admin-sidebar .nav-link.active {
            background: #d4a373;
            color: #2c1810;
        }
    </style>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(route('home')); ?>">
                <i class="fas fa-mug-hot"></i> Brew Haven
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon bg-light rounded"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('home')); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('products')); ?>">Products</a>
                    </li>
                    <?php if(auth()->guard()->check()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('contact')); ?>">Contact</a>
                        </li>
                        <?php if(auth()->user()->is_admin): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('admin.dashboard')); ?>">
                                    <i class="fas fa-chart-line"></i> Admin
                                </a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a class="nav-link position-relative" href="<?php echo e(route('cart')); ?>">
                                <i class="fas fa-shopping-cart fa-lg"></i>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger cart-count" id="cartCount">0</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user-circle"></i> <?php echo e(auth()->user()->name); ?>

                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a></li>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('login')); ?>">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('register')); ?>">Register</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Flash Messages -->
    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
            <i class="fas fa-check-circle"></i> <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
            <i class="fas fa-exclamation-circle"></i> <?php echo e(session('error')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <!-- Main Content -->
    <?php echo $__env->yieldContent('content'); ?>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5><i class="fas fa-mug-hot"></i> Brew Haven Coffee</h5>
                    <p>Experience the finest coffee crafted with passion and precision. Freshly roasted, perfectly brewed.</p>
                    <div class="mt-3">
                        <a href="#" class="me-3"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#" class="me-3"><i class="fab fa-instagram fa-lg"></i></a>
                        <a href="#" class="me-3"><i class="fab fa-twitter fa-lg"></i></a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="<?php echo e(route('home')); ?>"><i class="fas fa-chevron-right"></i> Home</a></li>
                        <li class="mb-2"><a href="<?php echo e(route('products')); ?>"><i class="fas fa-chevron-right"></i> Products</a></li>
                        <?php if(auth()->guard()->check()): ?>
                        <li class="mb-2"><a href="<?php echo e(route('contact')); ?>"><i class="fas fa-chevron-right"></i> Contact Us</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Contact Info</h5>
                    <p><i class="fas fa-phone-alt me-2"></i> +92 300 1234567</p>
                    <p><i class="fas fa-envelope me-2"></i> info@brewhaven.com</p>
                    <p><i class="fas fa-map-marker-alt me-2"></i> Gulberg, Lahore, Pakistan</p>
                    <p><i class="fas fa-clock me-2"></i> Mon-Sun: 8:00 AM - 11:00 PM</p>
                </div>
            </div>
            <hr class="bg-light">
            <div class="text-center">
                <p class="mb-0">&copy; 2024 Brew Haven Coffee Shop. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    
    <script>
        // Update cart count
        function updateCartCount() {
            // Get cart from session via AJAX
            $.ajax({
                url: '<?php echo e(route("cart")); ?>',
                method: 'GET',
                success: function(response) {
                    // This would be better with an API endpoint
                }
            });
            
            // For demo, we'll use localStorage
            let cart = JSON.parse(localStorage.getItem('cart') || '{}');
            let count = Object.values(cart).reduce((sum, item) => sum + item.quantity, 0);
            $('#cartCount').text(count);
        }
        
        $(document).ready(function() {
            updateCartCount();
            
            // Auto-hide alerts after 5 seconds
            setTimeout(function() {
                $('.alert').fadeOut('slow');
            }, 5000);
        });
    </script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH C:\Users\Shahbaz Computers\coffee-shop\resources\views/layouts/app.blade.php ENDPATH**/ ?>