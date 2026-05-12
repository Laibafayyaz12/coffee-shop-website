<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {

            if (!auth()->user()->is_admin) {
                return redirect('/')->with('error', 'You do not have admin access.');
            }

            return $next($request);
        });
    }

    public function index()
    {
        $totalOrders = Order::count();
        $totalProducts = Product::count();
        $totalCustomers = User::where('is_admin', false)->count();
        $totalRevenue = Order::sum('total_amount');
        $pendingOrders = Order::where('status', 'pending')->count();

        return view('admin.dashboard', compact(
            'totalOrders',
            'totalProducts',
            'totalCustomers',
            'totalRevenue',
            'pendingOrders'
        ));
    }

    public function products()
    {
        return view('admin.products');
    }

    public function getProductsData()
    {
        $products = Product::query();

        return DataTables::of($products)

            ->addColumn('action', function ($product) {

                return '
                    <button class="btn btn-sm btn-info edit-product" data-id="'.$product->id.'">
                        Edit
                    </button>

                    <button class="btn btn-sm btn-danger delete-product" data-id="'.$product->id.'">
                        Delete
                    </button>
                ';
            })

            ->editColumn('price', function ($product) {

                return '₨ ' . number_format($product->price, 2);
            })

            ->editColumn('is_active', function ($product) {

                return $product->is_active
                    ? '<span class="badge bg-success">Active</span>'
                    : '<span class="badge bg-danger">Inactive</span>';
            })

            ->rawColumns(['action', 'is_active'])

            ->make(true);
    }

    // STORE PRODUCT
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:products',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'category' => 'required|string',
            'stock' => 'required|integer|min:0'
        ]);

        // Generate slug automatically
        $slug = $request->slug ?? Str::slug($request->name);

        $product = Product::create([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'category' => $request->category,
            'stock' => $request->stock,
            'is_active' => true
        ]);

        return response()->json([
            'success' => true,
            'product' => $product
        ]);
    }

    // EDIT PRODUCT
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return response()->json($product);
    }

    // UPDATE PRODUCT
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'category' => 'required|string',
            'stock' => 'required|integer|min:0',
            'is_active' => 'required|boolean'
        ]);

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'category' => $request->category,
            'stock' => $request->stock,
            'is_active' => $request->is_active
        ]);

        return response()->json([
            'success' => true,
            'product' => $product
        ]);
    }

    // DELETE PRODUCT
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return response()->json([
            'success' => true
        ]);
    }

    public function orders()
    {
        return view('admin.orders');
    }

    public function getOrdersData()
    {
        $orders = Order::with('user');

        return DataTables::of($orders)

            ->addColumn('action', function ($order) {

                return '
                    <a href="'.route('admin.order-items', $order->id).'"
                       class="btn btn-sm btn-info">
                       View Items
                    </a>
                ';
            })

            ->editColumn('total_amount', function ($order) {

                return '₨ ' . number_format($order->total_amount, 2);
            })

            ->editColumn('status', function ($order) {

                return '
                    <select class="form-select form-select-sm status-update"
                            data-id="'.$order->id.'"
                            style="width: 130px;">

                        <option value="pending" '.($order->status == 'pending' ? 'selected' : '').'>
                            Pending
                        </option>

                        <option value="processing" '.($order->status == 'processing' ? 'selected' : '').'>
                            Processing
                        </option>

                        <option value="completed" '.($order->status == 'completed' ? 'selected' : '').'>
                            Completed
                        </option>

                        <option value="cancelled" '.($order->status == 'cancelled' ? 'selected' : '').'>
                            Cancelled
                        </option>

                    </select>
                ';
            })

            ->rawColumns(['action', 'status'])

            ->make(true);
    }

    public function updateOrderStatus(Request $request)
    {
        $order = Order::findOrFail($request->order_id);

        $order->status = $request->status;

        $order->save();

        return response()->json([
            'success' => true
        ]);
    }

    public function orderItems($id)
    {
        $order = Order::with('items.product')->findOrFail($id);

        return view('admin.order-items', compact('order'));
    }

    public function contacts()
    {
        return view('admin.contacts');
    }

    public function getContactsData()
    {
        $contacts = Contact::with('user')
            ->orderBy('created_at', 'desc');

        return DataTables::of($contacts)

            ->addColumn('action', function ($contact) {

                return '
                    <button class="btn btn-sm btn-primary reply-contact"
                            data-id="'.$contact->id.'"
                            data-message="'.e($contact->message).'">

                        Reply

                    </button>
                ';
            })

            ->editColumn('is_replied', function ($contact) {

                return $contact->is_replied
                    ? '<span class="badge bg-success">Replied</span>'
                    : '<span class="badge bg-warning">Pending</span>';
            })

            ->editColumn('message', function ($contact) {

                return strlen($contact->message) > 50
                    ? substr($contact->message, 0, 50) . '...'
                    : $contact->message;
            })

            ->rawColumns(['action', 'is_replied'])

            ->make(true);
    }

    public function replyContact(Request $request)
    {
        $request->validate([
            'contact_id' => 'required',
            'reply' => 'required|string'
        ]);

        $contact = Contact::findOrFail($request->contact_id);

        $contact->reply = $request->reply;

        $contact->is_replied = true;

        $contact->save();

        return response()->json([
            'success' => true
        ]);
    }

    public function customers()
    {
        return view('admin.customers');
    }

    public function getCustomersData()
    {
        $customers = User::where('is_admin', false)
            ->withCount('orders')
            ->with('orders');

        return DataTables::of($customers)

            ->addColumn('total_spent', function ($customer) {

                return '₨ ' . number_format(
                    $customer->orders->sum('total_amount'),
                    2
                );
            })

            ->addColumn('orders_count', function ($customer) {

                return $customer->orders_count;
            })

            ->make(true);
    }
}