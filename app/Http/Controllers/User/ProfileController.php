<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = auth()->user();
        return view('users.profile', compact('user'));
    }

    public function edit()
    {
        $user = auth()->user();
        return view('users.edit-profile', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $user = auth()->user();

        // Nếu người dùng upload ảnh mới
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->save();

        return redirect()->route('users.profile')->with('success', 'Cập nhật thành công!');
    }
}
