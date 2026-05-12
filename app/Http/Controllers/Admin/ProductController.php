<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products');
    }

    public function getData()
    {
        $products = Product::query();
        return DataTables::of($products)
            ->addColumn('action', function($product) {
                return '<button class="btn btn-sm btn-info edit-product" data-id="'.$product->id.'">Edit</button>
                        <button class="btn btn-sm btn-danger delete-product" data-id="'.$product->id.'">Delete</button>';
            })
            ->editColumn('price', function($product) {
                return '₨ ' . number_format($product->price, 2);
            })
            ->editColumn('is_active', function($product) {
                return $product->is_active ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>';
            })
            ->editColumn('image', function($product) {
                if($product->image) {
                    return '<img src="'.$product->image.'" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">';
                }
                return '<span class="text-muted">No image</span>';
            })
            ->rawColumns(['action', 'is_active', 'image'])
            ->make(true);
    }

   public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'category' => 'required|string',
        'stock' => 'required|integer|min:0',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $slug = \Illuminate\Support\Str::slug($request->name);
    
    // Handle image upload
    $imagePath = null;
    if($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('uploads/products'), $imageName);
        $imagePath = '/uploads/products/' . $imageName;
    }

    $product = Product::create([
        'name' => $request->name,
        'slug' => $slug,
        'description' => $request->description,
        'price' => $request->price,
        'sale_price' => $request->sale_price,
        'category' => $request->category,
        'stock' => $request->stock,
        'image' => $imagePath,
        'is_active' => true
    ]);

    return response()->json(['success' => true, 'product' => $product]);
}

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->only(['name', 'description', 'price', 'sale_price', 'category', 'stock', 'is_active']);
        
        if($request->hasFile('image')) {
            // Delete old image if exists
            if($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }
            
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/products'), $imageName);
            $data['image'] = '/images/products/' . $imageName;
        }

        $product->update($data);

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        
        // Delete image file if exists
        if($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }
        
        $product->delete();
        return response()->json(['success' => true]);
    }
}