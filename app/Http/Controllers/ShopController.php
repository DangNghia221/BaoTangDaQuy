<?php
namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\ShopCategory;
use App\Models\Libary;  // Sử dụng đúng tên model
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $items = Shop::with('category')->get();
        return view('admin.shop.index', compact('items'));
    }

    public function create()
    {
        $categories = ShopCategory::all();
        $libaries = Libary::all();  // Sử dụng đúng tên model
        return view('admin.shop.create', compact('categories', 'libaries'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:shop_categories,id',
            'image' => 'nullable|image|max:2048',
        ]);
    
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('shop_products', 'public');
        }
    
        Shop::create($data);
        return redirect()->route('shop.index')->with('success', 'Đã thêm sản phẩm.');
    }
    

    public function edit(Shop $shop)
    {
        $categories = ShopCategory::all();
        $libaries = Libary::all();  // Sử dụng đúng tên model
        return view('admin.shop.edit', compact('shop', 'categories', 'libaries'));  // Truyền $libaries vào view
    }

    public function update(Request $request, Shop $shop)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'shop_category_id' => 'required|exists:shop_categories,id', // Đảm bảo trường này đúng
            'image' => 'nullable|image|max:2048',
        ]);
    
        // Loại bỏ tất cả thẻ HTML từ mô tả
        $data['description'] = strip_tags($request->description);
    
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('shop_products', 'public');
        }
    
        $shop->update($data);
        return redirect()->route('shop.index')->with('success', 'Đã cập nhật sản phẩm.');
    }
    
    
    

    public function destroy(Shop $shop)
    {
        $shop->delete();
    
        return redirect()->route('shop.index')->with('success', 'Sản phẩm đã được xóa.');
    }
    public function trashed()
{
    $items = Shop::onlyTrashed()->get();
    return view('admin.shop.trashed', compact('items'));
}



}
