<?php
namespace App\Http\Controllers;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShoppingHistory;

class ShoppingHistoryController extends Controller
{
    public function index()
    {
        $shoppingHistories = ShoppingHistory::with(['user', 'shop'])->get();
        return view('admin.shopping.index', compact('shoppingHistories'));
    }
    public function store(Request $request, $id)
    {
        $shop = Shop::findOrFail($id);
        
        // Kiểm tra nếu người dùng đã đăng nhập
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để mua sản phẩm');
        }
    
        // Lấy số lượng từ form
        $quantity = $request->input('quantity', 1); // Nếu không có giá trị quantity, mặc định là 1
        
        // Thêm vào lịch sử mua hàng với trạng thái mặc định là 'pending' (Chờ xử lý)
        ShoppingHistory::create([
            'user_id' => Auth::id(),
            'shops_id' => $shop->id,
            'quantity' => $quantity, // Lưu số lượng từ form
            'price' => $shop->price,
            'purchased_at' => now(),
            'status' => 'pending', // Đặt trạng thái mặc định là 'pending'
        ]);
        
        // Sau khi mua thành công, trả về trang trước với thông báo thành công
        return redirect()->back()->with('success', 'Purchase successful!');
    }
    

    public function destroy($id)
    {
        $shoppingHistory = ShoppingHistory::findOrFail($id);
        $shoppingHistory->delete(); // Xóa mềm
    
        return redirect()->route('admin.shopping.index')->with('success', 'Lịch sử mua hàng đã được xóa.');
    }
    
public function confirm($id)
{
    // Tìm lịch sử mua hàng theo ID
    $shoppingHistory = ShoppingHistory::findOrFail($id);
    
    // Cập nhật trạng thái thành 'confirmed' (Đã xác nhận)
    $shoppingHistory->status = 'confirmed';
    $shoppingHistory->save(); // Lưu thay đổi vào cơ sở dữ liệu

    // Quay lại trang danh sách với thông báo thành công
    return redirect()->route('admin.shopping.index')->with('success', 'Lịch sử mua đã được xác nhận.');
}


}
