<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài viết</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="font-family: 'Roboto', sans-serif; margin: 0; background-color: #fdf7ef;">

    {{-- HEADER --}}
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

    {{-- NỘI DUNG --}}
<div style="padding: 40px;">
    <h2 style="text-align: center; color: #9b1c1c; margin-bottom: 40px;">Danh Sách Bài Viết</h2>

    <div style="display: flex; flex-wrap: wrap; gap: 30px; justify-content: center;">
        @foreach($posts as $post)
            <div style="width: 300px; background: white; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); overflow: hidden;">
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" style="width: 100%; height: 200px; object-fit: cover;">
                @else
                    <div style="width: 100%; height: 200px; background: #ccc; display: flex; align-items: center; justify-content: center;">
                        <span style="color: #555;">Không có ảnh</span>
                    </div>
                @endif

                <div style="padding: 15px;">
                    <h3 style="font-size: 18px;">
                        <a href="{{ route('posts.show', $post->id) }}" style="color: #9b1c1c; text-decoration: none;">
                            {{ $post->title }}
                        </a>
                    </h3>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Phân trang --}}
    <div class="d-flex justify-content-center mt-5">
        {{ $posts->links('pagination::bootstrap-4') }}
    </div>
</div>

</body>
<footer style="background-color: #7b1e1e; color: white; padding: 40px 20px;">
    <div style="display: flex; flex-wrap: wrap; justify-content: space-between; gap: 20px;">
        
        <!-- Bên trái: Thông tin bảo tàng -->
        <div style="flex: 1; min-width: 280px; margin-bottom: 20px; text-align: left;padding-left: 80px;">
            <h3 style="color: #ffd700;">Bảo Tàng Đỗ Hùng</h3>
            <p><strong>Địa chỉ:</strong> 44 Đ. Nguyễn Khuyến, Tân An, Ninh Kiều, Cần Thơ 900000</p>
            <p><strong>Tầng trệt (G):</strong> Đá quý Việt Nam</p>
            <p><strong>Tầng 1-3:</strong> Đá quý nổi tiếng</p>
            <p><a href="https://www.google.com/maps/place/Museum+of+Tarot+-+B%E1%BA%A3o+T%C3%A0ng+Tarot/@10.034515,105.7806985,17z/data=!4m6!3m5!1s0x31a062a012ce1a7f:0x94227f06590edd93!8m2!3d10.0344872!4d105.783198!16s%2Fg%2F11bz092swr?hl=vi&entry=ttu&g_ep=EgoyMDI1MDQwMi4xIKXMDSoJLDEwMjExNDU1SAFQAw%3D%3D" style="color: #ffd700;">Xem bản đồ tại đây</a></p>
            <p><strong>Giờ mở cửa:</strong> 08:30 – 21:00 Tất cả các ngày trong tuần</p>
            <p><strong>Email:</strong> nghia@gmail.com</p>
            <p><strong>Hotline:</strong> <a href="tel:1900633077" style="color: #ffd700;">1900 633 077</a></p>
            <p><strong>Số điện thoại:</strong> <a href="tel:0589151934" style="color: #ffd700;">0589 151 934</a></p>
        </div>

        <!-- Bên phải: Bản đồ -->
        <div style="flex: 1; min-width: 300px;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2778.0711826556526!2d105.7806984925208!3d10.03451503907832!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a062a012ce1a7f%3A0x94227f06590edd93!2sMuseum%20of%20Tarot%20-%20B%E1%BA%A3o%20T%C3%A0ng%20Tarot!5e0!3m2!1svi!2s!4v1744094936200!5m2!1svi!2s" 
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</footer>

</html>
