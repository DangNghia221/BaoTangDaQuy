<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
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
            'status' => 'required|in:draft,published',
        ]);

        $category = new Categories();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = $request->status;

        if ($request->hasFile('image')) {
            $category->image = $request->file('image')->store('categories');
        }

        $category->save();

        return redirect()->route('categories.index')->with('success', 'Danh mục đã được tạo thành công!');
    }

    public function edit(Categories $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Categories $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = $request->status;

        if ($request->hasFile('image')) {
            $category->image = $request->file('image')->store('categories');
        }

        $category->save();

        return redirect()->route('categories.index')->with('success', 'Danh mục đã được cập nhật thành công!');
    }

    public function destroy(Categories $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Danh mục đã bị xóa!');
    }
}
