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
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'status' => 'required|in:pending,confirmed,canceled'
        ]);

        Booking::create($request->all());

        return redirect()->route('bookings.index')->with('success', 'Đặt vé thành công!');
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $users = User::all();
        $products = Product::all();
    
        return view('admin.bookings.edit', compact('booking', 'users', 'products'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'status' => 'required|in:pending,confirmed,canceled',
        ]);
    
        $booking = Booking::findOrFail($id);
        $booking->update($request->all());
    
        return redirect()->route('bookings.index')->with('success', 'Đơn đặt vé đã được cập nhật thành công.');
    }
    
    public function pay($id) {
        $booking = Booking::findOrFail($id);
        $booking->status = 'confirmed'; // Cập nhật trạng thái thành "Đã xác nhận"
        $booking->save();
    
        return redirect()->route('bookings.index')->with('success', 'Thanh toán thành công!');
    }
    
    public function destroy($id)
    {
        Booking::findOrFail($id)->delete();
        return redirect()->route('bookings.index')->with('success', 'Xóa đặt vé thành công!');
    }
}
