<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
## 🚀 1. Project Folder
cd C:\Users\Shahbaz Computers\coffee-shop

## ⚙️ 2. Dependencies install
composer install

## 🔑 3. .env file setup
cp .env.example .env

## 🔐 4. App key generate karo
php artisan key:generate

## 🗄️ 5. Database setup
👉 .env file
DB_DATABASE=laravel

DB_USERNAME=root

DB_PASSWORD=

## 📊 6. Tables create karo
php artisan migrate

## 🌱 7. Dummy data (products)
php artisan db:seed

php artisan db:seed --class=ProductSeeder

## 🔗 8. Storage link (images)
php artisan storage:link

## ▶️ 9. Server
php artisan serve

## 🌐 10. Browser
http://127.0.0.1:8000

## 📁 Complete File Structure

# 📁 Complete File Structure

<pre>
coffee-shop/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Frontend/
│   │   │   │   ├── HomeController.php
│   │   │   │   ├── ProductController.php
│   │   │   │   ├── CartController.php
│   │   │   │   ├── CheckoutController.php
│   │   │   │   └── ContactController.php
│   │   │   └── Admin/
│   │   │       ├── DashboardController.php
│   │   │       └── ProductController.php
│   │   └── Middleware/
│   │       └── AdminMiddleware.php
│   └── Models/
│       ├── Product.php
│       ├── Order.php
│       ├── OrderItem.php
│       └── Contact.php
│
├── database/
│   ├── migrations/
│   │   ├── create_products_table.php
│   │   ├── create_orders_table.php
│   │   ├── create_order_items_table.php
│   │   └── create_contacts_table.php
│   └── seeders/
│       ├── ProductSeeder.php
│       └── AdminSeeder.php
│
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php
│       ├── frontend/
│       │   ├── home.blade.php
│       │   ├── products.blade.php
│       │   ├── product-detail.blade.php
│       │   ├── cart.blade.php
│       │   ├── checkout.blade.php
│       │   └── contact.blade.php
│       └── admin/
│           ├── dashboard.blade.php
│           ├── products.blade.php
│           ├── orders.blade.php
│           ├── contacts.blade.php
│           └── customers.blade.php
│
├── public/
│   ├── images/
│   │   └── coffee-images/
│   └── index.php
│
├── routes/
│   └── web.php
│
├── .env.example
├── composer.json
├── package.json
└── README.md
</pre>

---

# ✨ Features

## 🏠 Frontend Features
- Home Page with Hero Banner
- Products Listing with Categories
- Single Product Details View
- Shopping Cart (Add/Remove/Update)
- Secure Checkout System
- Contact Form (Login Required)
- User Authentication (Login/Register)

## 🔧 Admin Panel Features
- Dashboard with Statistics
- Product CRUD with Images
- Order Management with Status Updates
- Customer Management
- Contact Message Management with Reply System

## 💻 Technical Features
- Yajra DataTables Integration
- Session-based Shopping Cart
- MySQL Database Relationships
- Admin Middleware Security
- Image Upload Functionality
- AJAX Cart Operations

---

# 🛠️ Technology Stack

| Category | Technologies |
|----------|--------------|
| Frontend | HTML5, CSS3, JavaScript, Bootstrap 5, jQuery, AJAX |
| Backend | Laravel 10.50, PHP 8.1.25 |
| Database | MySQL 8.0+ |
| Packages | Yajra DataTables, Intervention Image, Laravel UI |

---

# 🗄️ Database Tables

| Table | Columns |
|-------|---------|
| users | id, name, email, password, is_admin, timestamps |
| products | id, name, slug, description, price, sale_price, image, category, stock, is_active |
| orders | id, user_id, order_number, total_amount, status, payment_method, shipping_address, city, postal_code, phone |
| order_items | id, order_id, product_id, quantity, price |
| contacts | id, user_id, subject, message, reply, is_replied |

---

# 🔗 Table Relationships

- users (1) → has many → orders (many)
- users (1) → has many → contacts (many)
- orders (1) → has many → order_items (many)
- products (1) → has many → order_items (many)

---

# 📱 User Flow

| Step | Action |
|------|--------|
| 1 | Visit Website |
| 2 | Browse Products |
| 3 | Add to Cart |
| 4 | View Cart (Update/Remove) |
| 5 | Proceed to Checkout |
| 6 | Login/Register |
| 7 | Fill Order Details |
| 8 | Select Payment Method |
| 9 | Place Order |
| 10 | Order Confirmed |

---

# 👑 Admin Flow

| Step | Action |
|------|--------|
| 1 | Login as Admin |
| 2 | View Dashboard Stats |
| 3 | Manage Products (Add/Edit/Delete) |
| 4 | Manage Orders (Update Status) |
| 5 | View Customers |
| 6 | Manage Contacts (Reply to Messages) |

---

# 📊 API Routes

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | / | Home Page |
| GET | /products | Products List |
| GET | /product/{slug} | Product Details |
| POST | /cart/add | Add to Cart |
| POST | /cart/update | Update Cart |
| POST | /cart/remove | Remove from Cart |
| GET | /checkout | Checkout Page |
| POST | /checkout | Place Order |
| GET | /admin | Admin Dashboard |
| GET | /admin/products-data | Products DataTable |
| GET | /admin/orders-data | Orders DataTable |
| POST | /admin/update-order-status | Update Order Status |
| POST | /admin/reply-contact | Reply to Contact |

---

# 🚀 Installation Commands

```bash
# 1. Install PHP dependencies
composer install

# 2. Install NPM dependencies
npm install

# 3. Create environment file
cp .env.example .env

# 4. Generate application key
php artisan key:generate

# 5. Run migrations and seeders
php artisan migrate --seed

# 6. Create storage link
php artisan storage:link

# 7. Build frontend assets
npm run build

# 8. Start development server
php artisan serve



## ✨ Features
🛍️ Customer Features

✅ Beautiful Home Page with Hero Section

✅ Product Listing with Search & Category Filter

✅ Sidebar with Category Navigation

✅ Single Product View with Related Products

✅ Shopping Cart (Session Based)

✅ Checkout & Order Placement

✅ My Orders Page (Track Orders)

✅ Contact Form with Email Notification

✅ User Registration & Login

✅ Responsive Design (Mobile Friendly)

## 🔐 Admin Features
✅ Admin Dashboard with Live Stats

✅ Products Management (Add, Edit, Delete, Image Upload)

✅ Orders Management with Status Update

✅ Users Management

✅ DataTables Integration (Search, Sort, Pagination)

✅ Admin Sidebar Navigation

✅ Revenue Tracking

✅ Recent Orders on Dashboard

## AUTHOR
NAME :LAIBA FAYYAZ

ROLL NO : COSC231101014

## DEMO VIDEO LINK : https://drive.google.com/file/d/1rR3mOwJ-7zyNDEpGVwxn6q-k_U8EbPK7/view?usp=drivesdk


DEMO VIDEO LINK : https://drive.google.com/file/d/1rR3mOwJ-7zyNDEpGVwxn6q-k_U8EbPK7/view?usp=drivesdk
