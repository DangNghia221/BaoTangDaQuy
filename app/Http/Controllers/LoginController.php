<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Thêm dòng này để sử dụng Auth

class LoginController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLoginForm()
    {
        return view('login'); // Hoặc 'auth.login' nếu bạn lưu ở thư mục 'auth'
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        // Xác thực người dùng
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Kiểm tra quyền hạn của người dùng
            if ($user->usertype === 'admin') {
                return redirect()->route('admin.dashboard');  // Nếu người dùng là admin
            }

            return redirect()->route('home');  // Nếu người dùng là thường
        }

        // Nếu đăng nhập không thành công
        return redirect()->back()->withErrors(['email' => 'Tài khoản hoặc mật khẩu không đúng']);
    }
}
