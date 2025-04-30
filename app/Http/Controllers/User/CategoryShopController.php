<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ShopCategory;

class CategoryShopController extends Controller
{
    public function index()
    {
        $categories = ShopCategory::all();
        return view('users.categoryshop.index', compact('categories'));
    }

    public function showDetail($categoryId)
    {
        // Lấy danh mục theo ID
        $category = ShopCategory::findOrFail($categoryId);  // Dùng $category để truyền

        // Trả về view với thông tin danh mục
        return view('users.categoryshop.detail', compact('category'));  // Truyền biến $category
    }
    
}
