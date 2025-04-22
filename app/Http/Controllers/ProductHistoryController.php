<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProductHistoryController extends Controller
{
    // Constructor để kiểm tra người dùng đã đăng nhập hay chưa
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Lưu lịch sử xem sản phẩm.
     */
    public function store($id)
    {
        $product = Product::find($id);  // Tìm sản phẩm theo ID, sẽ trả về null nếu không tìm thấy
        
        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Sản phẩm không tồn tại.');
        }
        
        if (Auth::check()) {
            $userId = Auth::id();  // Lấy ID người dùng hiện tại
            
            // Lưu lịch sử xem sản phẩm vào bảng product_histories
            $this->saveProductHistory($userId, $product);
            
            // Log thông tin ID người dùng để kiểm tra
            Log::info("User ID: {$userId} đang xem sản phẩm ID: {$product->id}");
        }

        return redirect()->to('/ticker/detail/' . $product->id);

    }

    /**
     * Lưu thông tin lịch sử xem sản phẩm vào cơ sở dữ liệu.
     */
    protected function saveProductHistory($userId, $product)
    {
        ProductHistory::create([
            'user_id' => $userId,
            'product_id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'image' => $product->image,
            'event_date' => now()->toDateString(),
        ]);
    }

    /**
     * Hiển thị lịch sử xem sản phẩm.
     */
    public function showHistory()
    {
        // Lấy tất cả lịch sử xem sản phẩm của người dùng hiện tại
        $history = ProductHistory::where('user_id', Auth::id())->paginate(10);  // Phân trang kết quả

        // Trả về view với dữ liệu lịch sử
        return view('users.history.index', compact('history'));
    }
}
