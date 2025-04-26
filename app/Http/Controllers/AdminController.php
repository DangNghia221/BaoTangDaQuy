<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
{
    if (Auth::check()) {
        $usertype = Auth::user()->usertype;

        if ($usertype == 'user') {
            return view('dashboard');
        } else if ($usertype == 'admin') {
            return view('admin.dashboard');
        }
    }
    return view('users.home');

}


    // Hiển thị trang profile admin
    public function profile()
    {
        $admin = Auth::user();
        return view('admin.profile', compact('admin'));
    }

    // Xử lý cập nhật thông tin profile admin
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|max:15',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'password' => 'nullable|min:6|confirmed',
        ]);
    
        $admin = Auth::user();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
    
        // Cập nhật avatar
        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            $admin->avatar = $path;
        }
    
        // Cập nhật mật khẩu nếu có nhập mới
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }
    
        $admin->save();
    
        return redirect()->route('admin.profile');
    }
}
