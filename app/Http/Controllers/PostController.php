<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // Hiển thị danh sách bài viết
    public function index()
    {
        $posts = Post::with('user')->get();
        return view('admin.post.index', compact('posts'));
    }

    // Hiển thị form tạo bài viết
    public function create()
    {
        return view('admin.post.create');
    }
    public function destroy($id)
{
    $post = Post::find($id);
    
    if (!$post) {
        return redirect()->route('post.index')->with('error', 'Post not found!');
    }

    // Xóa ảnh nếu có
    if ($post->image) {
        \Storage::delete('public/' . $post->image);
    }

    $post->delete();

    return redirect()->route('post.index')->with('success', 'Post deleted successfully!');
}

    // Lưu bài viết vào database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('posts', 'public'); // Lưu vào storage/app/public/posts
        }

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
            'status' => $request->status,
            'user_id' => Auth::id(), // Lấy ID user hiện tại
        ]);

        return redirect()->route('post.index')->with('success', 'Post created successfully');
    }
}
