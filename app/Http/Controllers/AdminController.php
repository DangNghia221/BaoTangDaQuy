<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::check()) { // Kiểm tra xem người dùng đã đăng nhập chưa
            $usertype = Auth::user()->usertype; 

            if ($usertype == 'user') {
                return view('dashboard');
            } 
            else if ($usertype == 'admin') {
                // Truy vấn danh sách user từ database
                $users = User::all();
                return view('admin.dashboard');
            } 
        }

        return redirect()->route('login'); // Nếu chưa đăng nhập, chuyển hướng về login
    }
}
