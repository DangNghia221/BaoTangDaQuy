<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category; // 🔥 Thêm model Category
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category', 'user')->get(); // Lấy bài viết và thông tin danh mục, người dùng
        return view('admin.post.index', compact('posts'));

        $posts = Post::all(); 
        return view('users.post.index', compact('posts'));
    }
    

    public function create()
    {
        $categories = Category::all(); // 🔥 Lấy danh mục để hiển thị
        return view('admin.post.create', compact('categories'));
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'category_id' => 'nullable|exists:categories,id',  // Kiểm tra category_id hợp lệ
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Tạo mới bài viết
    $post = new Post();
    $post->title = $request->title;
    $post->content = $request->content;
    $post->category_id = $request->category_id;  // Lưu category_id vào bài viết

    if ($request->hasFile('image')) {
        $post->image = $request->file('image')->store('posts', 'public');
    }

    $post->user_id = auth()->user()->id; // Gán user_id là ID của người dùng hiện tại

    $post->save();

    return redirect()->route('post.index')->with('success', 'Bài viết đã được tạo thành công!');
}

public function edit($id)
{
    $post = Post::findOrFail($id);
    $categories = Category::all();
    return view('admin.post.edit', compact('post', 'categories'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'category_id' => 'nullable|exists:categories,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $post = Post::findOrFail($id);
    $post->title = $request->title;
    $post->content = $request->content;
    $post->category_id = $request->category_id;

    if ($request->hasFile('image')) {
        // Xóa ảnh cũ nếu có
        if ($post->image) {
            Storage::delete('public/' . $post->image);
        }
        $post->image = $request->file('image')->store('posts', 'public');
    }

    $post->save();

    return redirect()->route('post.index')->with('success', 'Bài viết đã được cập nhật thành công!');
}


    public function destroy($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return redirect()->route('post.index')->with('error', 'Post not found!');
        }

        // 🔥 Xóa ảnh đúng cách
        if ($post->image) {
            Storage::delete($post->image); // Không cần 'public/'
        }

        $post->delete();

        return redirect()->route('post.index')->with('success', 'Post deleted successfully!');
    }
}
