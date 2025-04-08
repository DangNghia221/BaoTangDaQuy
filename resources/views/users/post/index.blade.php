{{-- resources/views/post/index.blade.php --}}
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách bài viết</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body { font-family: Arial, sans-serif; background-color: #f7f7f7; margin: 0; }
        .container { max-width: 900px; margin: 40px auto; padding: 20px; background: white; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h1 { color: #007bff; margin-bottom: 30px; }
        .post { border-bottom: 1px solid #eee; padding: 20px 0; }
        .post:last-child { border-bottom: none; }
        .post h2 { margin: 0 0 10px; color: #333; }
        .post p { margin: 0 0 10px; color: #555; }
        .btn { display: inline-block; padding: 8px 15px; background: #007bff; color: white; border-radius: 5px; text-decoration: none; }
        .btn:hover { background: #0056b3; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Danh sách bài viết</h1>

        @if($posts->count())
            @foreach($posts as $post)
                <div class="post">
                    <h2>{{ $post->title }}</h2>
                    <p>{{ \Illuminate\Support\Str::limit($post->content, 150) }}</p>
                    <a href="{{ route('post.show', $post->id) }}" class="btn">Xem chi tiết</a>
                </div>
            @endforeach
        @else
            <p>Hiện chưa có bài viết nào.</p>
        @endif
    </div>
</body>
</html>
