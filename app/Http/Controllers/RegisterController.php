<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    // Hiển thị form đăng ký
    public function showRegistrationForm()
    {
        return view('register');
    }

    // Xử lý đăng ký
    public function register(Request $request)
    {
        // Xác thực thông tin người dùng
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:15',
            'password' => 'required|string|confirmed|min:6',
        ]);

        // Tạo người dùng mới trong cơ sở dữ liệu
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Đăng nhập người dùng và chuyển hướng đến trang chủ hoặc trang mặc định
        auth()->login($user);

        return redirect()->route('home'); // Chuyển hướng đến trang chủ (hoặc trang khác tùy nhu cầu)
    }
}
