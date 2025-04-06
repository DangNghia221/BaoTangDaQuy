<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Product;
use App\Models\User;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('user', 'product')->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    public function create()
    {
        $users = User::all();
        $products = Product::all();
        return view('admin.bookings.create', compact('users', 'products'));
    }

    public function store(Request $request)
    {
        // Xác thực các trường cần thiết
        $request->validate([
            'user_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required|integer|min:1',
            'status' => 'required',
        ]);
        
        // Lấy sản phẩm từ DB
        $product = Product::findOrFail($request->product_id);
        
        // Tính giá tổng dựa trên sản phẩm và số lượng
        $totalPrice = $product->price * $request->quantity;
        
        // Lưu thông tin đặt vé vào cơ sở dữ liệu
        Booking::create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'status' => $request->status,
            'price' => $totalPrice,  // Lưu giá tiền tính toán vào trường price
            'booking_date' => now()
        ]);
        
        // Quay lại trang danh sách booking với thông báo thành công
        return redirect()->route('bookings.index')->with('success', 'Đặt vé thành công');
    }
    
    
    

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $users = User::all();
        $products = Product::all();
    
        return view('admin.bookings.edit', compact('booking', 'users', 'products'));
    }
    
    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'user_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required|integer|min:1',
            'status' => 'required'
        ]);
    
        // Lấy giá sản phẩm từ DB
        $product = Product::findOrFail($request->product_id);
        $totalPrice = $product->price * $request->quantity;
    
        $booking->update([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'status' => $request->status,
            'price' => $totalPrice
        ]);
    
        return redirect()->route('bookings.index')->with('success', 'Cập nhật vé thành công');
    }
    
    
    
    public function pay($id) {
        $booking = Booking::findOrFail($id);
        $booking->status = 'confirmed'; 
        $booking->save();
    
        return redirect()->route('bookings.index')->with('success', 'Thanh toán thành công!');
    }
    
    public function destroy($id)
    {
        Booking::findOrFail($id)->delete();
        return redirect()->route('bookings.index')->with('success', 'Xóa đặt vé thành công!');
    }
}
