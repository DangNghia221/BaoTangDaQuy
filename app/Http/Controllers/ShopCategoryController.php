<?php

namespace App\Http\Controllers;

use App\Models\ShopCategory;
use Illuminate\Http\Request;

class ShopCategoryController extends Controller
{
    public function index()
    {

        $categories = ShopCategory::all();
        return view('admin.shopcategory.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.shopcategory.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('shop_categories', 'public');
        }

        ShopCategory::create($data);
        return redirect()->route('shopcategory.index')->with('success', 'Đã thêm thể loại.');
    }

    public function edit(ShopCategory $shopcategory)
    {
        return view('admin.shopcategory.edit', compact('shopcategory'));
    }

    public function update(Request $request, ShopCategory $shopcategory)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('shop_categories', 'public');
        }

        $shopcategory->update($data);
        return redirect()->route('shopcategory.index')->with('success', 'Đã cập nhật.');
    }

    public function destroy(ShopCategory $shopcategory)
    {
        $shopcategory->delete();
        return back()->with('success', 'Đã xóa.');
    }
    public function trashed()
{
    $categories = ShopCategory::onlyTrashed()->get();
    return view('admin.shopcategory.trashed', compact('categories'));
}

public function restore($id)
{
    $category = ShopCategory::withTrashed()->findOrFail($id);
    $category->restore();
    return back()->with('success', 'Đã khôi phục danh mục.');
}

public function forceDelete($id)
{
    $category = ShopCategory::withTrashed()->findOrFail($id);
    $category->forceDelete();
    return back()->with('success', 'Đã xóa vĩnh viễn.');
}
public function show(ShopCategory $shopcategory)
{
    return view('users.shopcategory.show', compact('shopcategory'));
}


}
