<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Constructor để thêm middleware
     */
    public function restore($id)
{
    $user = User::onlyTrashed()->findOrFail($id);
    $user->restore();

    return redirect()->route('users.trashed')->with('success', 'User đã được khôi phục!');
}

public function forceDelete($id)
{
    $user = User::onlyTrashed()->findOrFail($id);
    $user->forceDelete();

    return redirect()->route('users.trashed')->with('success', 'User đã xoá vĩnh viễn!');
}

    public function trashed()
{
    $users = User::onlyTrashed()->get(); // Lấy user đã bị soft delete
    return view('admin.users.trashed', compact('users'));
}
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::whereNull('deleted_at')->select('id', 'name', 'email', 'usertype')->get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'usertype' => 'required|in:admin,user',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash password
            'usertype' => $request->usertype,
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'usertype' => 'required|in:admin,user',
        ]);

        // Cập nhật dữ liệu
        $user->name = $request->name;
        $user->usertype = $request->usertype;
        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
    
        if ($user->usertype === 'admin') {
            return redirect()->route('users.index')->with('error', 'Không thể xoá admin!');
        }
    
        $user->delete(); // Đây là xóa mềm
        return redirect()->route('users.index')->with('success', 'User đã bị xóa khỏi danh sách!');
    }
    
}
