<?php
namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\ShopCategory;
use App\Models\Libary;  // Sử dụng đúng tên model
use Illuminate\Http\Request;
use App\Models\ShoppingHistory;
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
            'category_id' => 'required|exists:shop_categories,id', // Đảm bảo trường này đúng
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
public function detail($id)
{
    $shop = Shop::with('category')->findOrFail($id);
   
    return view('users.categoryshop.detail', compact('shop'));
}
public function showCategory($id)
{
    $category = ShopCategory::with('shops')->findOrFail($id);
    return view('users.categoryshop.detail', compact('category'));
}
public function purchase($shopId, Request $request)
{
    // Lấy sản phẩm shop tương ứng
    $shop = Shop::findOrFail($shopId);

    // Lấy người dùng hiện tại
    $user = auth()->user();

    // Lấy số lượng từ form, mặc định là 1 nếu không có
    $quantity = $request->input('quantity', 1);

    // Tạo mới lịch sử mua hàng với trạng thái 'pending'
    $shoppingHistory = new ShoppingHistory();
    $shoppingHistory->user_id = $user->id;
    $shoppingHistory->shop_id = $shop->id;
    $shoppingHistory->quantity = $quantity;
    $shoppingHistory->price = $shop->price * $quantity;  // Tổng tiền = giá * số lượng
    $shoppingHistory->status = 'pending';  // Trạng thái chờ xử lý
    $shoppingHistory->purchased_at = now(); // Ghi nhận thời gian mua
    $shoppingHistory->save();

    // Chuyển hướng lại và thông báo
    return redirect()->back()->with('success', 'Đặt mua thành công, trạng thái đang chờ xử lý!');
}


}
