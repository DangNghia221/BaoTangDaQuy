<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>{{ $post->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .post-content img {
        max-width: 50% ;
        height: auto !important;
        display: block;
        margin: 20px auto !important;
        border-radius: 12px;
    }
</style>

</head>
<body style="font-family: 'Roboto', sans-serif; background-color: #fdf7ef;">

    {{-- Header giống index --}}
    <header style="display: flex; align-items: center; justify-content: space-between; background-color: #5c3b32; padding: 10px 30px;">
        <div style="display: flex; align-items: center;">
            <img src="{{ asset('images/1.jpg') }}" alt="Logo" style="height: 50px; margin-right: 15px;">
            <h1 style="margin: 0; color: white; font-size: 24px;">Bảo Tàng Đá Quý</h1>
        </div>
        <nav style="display: flex; gap: 20px;">
            <a href="{{ route('home') }}" style="color: white; text-decoration: none; font-weight: bold;">Trang chủ</a>
            <a href="{{ route('login.form') }}" style="color: white; text-decoration: none; font-weight: bold;">Đăng nhập</a>
            <a href="{{ route('register.form') }}" style="color: white; text-decoration: none; font-weight: bold;">Đăng ký</a>
            <a href="{{ route('news.index') }}" style="color: white; text-decoration: none; font-weight: bold;">Bài viết</a>
        </nav>
    </header>

    <div class="container mt-5">
        <h2 style="color: #9b1c1c;">{{ $post->title }}</h2>

        @if($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" style="width: 50%; max-height: 500px; object-fit: cover; border-radius: 12px;">
        @endif

        {{-- 📌 Thêm class "post-content" để áp dụng style cho hình ảnh trong nội dung --}}
        <div class="post-content mt-4" style="line-height: 1.7; font-size: 18px;">
            {!! $post->content !!}
        </div>

        <a href="{{ route('news.index') }}" class="btn btn-secondary mt-4">← Quay lại danh sách</a>
    </div>

</body>
</html>
