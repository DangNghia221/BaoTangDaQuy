<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('user')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->user_id = auth()->user()->id;

        if ($request->hasFile('image')) {
            $category->image = $request->file('image')->store('categories', 'public');
        }

        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'Danh mục đã được thêm thành công!');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
{
    $category = Category::findOrFail($id);
    
    // Validate dữ liệu
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    // Cập nhật thông tin
    $category->name = $request->name;
    $category->description = $request->description;

    // Xử lý ảnh nếu có tải lên
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('categories', 'public');
        $category->image = $imagePath;
    }

    $category->save();

    return redirect()->route('admin.categories.index')->with('success', 'Danh mục đã được cập nhật thành công!');
}

    public function destroy(Category $category)
    {
        if (!$category) {
            return redirect()->route('admin.categories.index')->with('error', 'Danh mục không tồn tại.');
        }
    
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Danh mục đã bị xóa.');
    }
    
    
}
