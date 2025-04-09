<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(8);
        return view('users.news.index', compact('posts'));

    }
    public function show($id)
{
    $post = Post::findOrFail($id);
    return view('users.news.show', compact('post'));
}


    
}
