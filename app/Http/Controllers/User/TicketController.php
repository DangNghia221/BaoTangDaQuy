<?php
namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking; 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Pagination\Paginator;
class TicketController extends Controller
{
    public function index()
    {
        $products = Product::paginate(6);
        return view('users.ticket.index', compact('products'));
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('users.ticket.detail', compact('product'));
    }
    
    public function order(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $quantity = $request->input('quantity');
    
        if ($quantity < 1 || $quantity > $product->quantity) {
            return back()->with('error', 'Số lượng không hợp lệ');
        }
    
        // Trừ số lượng vé
        $product->decrement('quantity', $quantity);
    
        // Tạo bản ghi booking
        Booking::create([
            'user_id' => Auth::id(), // người dùng đang đăng nhập
            'product_id' => $product->id,
            'quantity' => $quantity,
            'status' => 'pending', // hoặc 'confirmed' nếu bạn muốn
            'price' => $product->price * $quantity,
            'booking_date' => now(),
        ]);
    
        return back()->with('success', 'Đặt vé thành công!');
    }


}
