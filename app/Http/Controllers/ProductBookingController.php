<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductBookingController extends Controller
{
    public function index(Request $request)
    {
        $from = $request->input('from', now()->toDateString()); // Ngày hiện tại
        $to = $request->input('to'); // Không chọn thì sẽ là null
    
        $products = [];
    
        if ($from && $to) {
            $products = Product::whereBetween('event_date', [$from, $to])->get();
        }
    
        return view('users.book.index', compact('products', 'from', 'to'));
    }
    
}
