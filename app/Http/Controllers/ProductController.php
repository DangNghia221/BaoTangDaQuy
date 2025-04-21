<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage; 
class ProductController extends Controller
{
    public function index()
    {
        // Lấy sản phẩm chưa bị xóa
        $products = Product::whereNull('deleted_at')->get();
    
        // Nếu muốn truyền thêm danh sách sản phẩm đã xóa:
        $deletedProducts = Product::onlyTrashed()->get();
    
        return view('admin.product.index', compact('products', 'deletedProducts'));
    }
    public function trashed()
{
    $deletedProducts = Product::onlyTrashed()->get();
    return view('admin.product.trashed', compact('deletedProducts'));
}
    public function restore($id)
    {
        $product = Product::withTrashed()->findOrFail($id);
        $product->restore();
    
        return redirect()->route('product.index')->with('success', 'Sản phẩm đã được khôi phục!');
    }
    

    
    public function create()
    {
        return view('admin.product.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
        'quantity' => 'required|integer|min:0',
        'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
    ]);

    $product = new Product();
    $product->name = $request->name;
    $product->description = $request->description;
    $product->price = $request->price;
    $product->quantity = $request->quantity;

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('product', 'public');
        $product->image = $path;
    }

    $product->save();

    return redirect()->route('product.index')->with('success', 'Product created successfully.');
}


    public function edit(Product $product)
    {
        return view('admin.product.edit', compact('product'));
    }

    public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'quantity' => 'required|integer|min:0',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    ]);

    $product->name = $request->name;
    $product->description = $request->description; // <--- THÊM DÒNG NÀY
    $product->price = $request->price;
    $product->quantity = $request->quantity;

    if ($request->hasFile('image')) {
        if ($product->image) {
            Storage::delete('public/' . $product->image);
        }
        $path = $request->file('image')->store('products', 'public');
        $product->image = $path;
    }

    $product->save();

    return redirect()->route('product.index')->with('success', 'Product updated successfully!');
}

    

    public function destroy(Product $product)
    {
        $product->delete(); // Soft delete
        return redirect()->route('product.index')->with('success', 'Sản phẩm đã được ẩn.');
    }
    
}
