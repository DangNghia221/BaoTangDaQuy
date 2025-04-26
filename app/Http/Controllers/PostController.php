<?php
namespace App\Http\Controllers;
use App\Models\Libary;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category; 
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
        $categories = Category::all(); 
        $libaries = Libary::latest()->get();  // Lấy danh sách ảnh từ thư viện
    return view('admin.post.create', compact('categories', 'libaries')); 
    }
    // Hiển thị danh sách bài viết
public function list()
{
    $posts = Post::latest()->paginate(4); 
    return view('users.post.index', compact('posts')); 
}

// Hiển thị chi tiết bài viết
public function show($slug)
{
    $post = Post::where('slug', $slug)->firstOrFail();
    return view('post.show', compact('post'));
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
    $libaries = Libary::latest()->get();  // Lấy danh sách ảnh từ thư viện
    return view('admin.post.edit', compact('post', 'categories', 'libaries'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'category_id' => 'nullable|exists:categories,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'image_from_libary' => 'nullable|string', // Thêm validation cho ảnh từ thư viện
    ]);

    $post = Post::findOrFail($id);
    $post->title = $request->title;
    $post->content = $request->content;
    $post->category_id = $request->category_id;

    // Kiểm tra nếu người dùng chọn ảnh từ thư viện
    if ($request->has('image_from_libary')) {
        $post->image = $request->image_from_libary; // Sử dụng ảnh từ thư viện
    } elseif ($request->hasFile('image')) {
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
