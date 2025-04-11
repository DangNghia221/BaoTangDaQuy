<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

class InvoiceController extends Controller
{
    public function index() // Hàm index trong controller
    {
        $user = Auth::user(); // Lấy user đang đăng nhập
    
        // Lấy tất cả booking mà user hiện tại đã đặt (nếu bảng bookings có user_id)
        $bookings = Booking::where('user_id', Auth::id())->with('product')->get();

    
        // Trả dữ liệu ra view
        return view('users.invoices.index', compact('bookings'));
    }
}
