<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<style>
    header, footer {
        background-color: #5D4037;
        color: white;
        padding: 20px;
        text-align: center;
    }
    nav a {
        color: white;
        margin: 0 10px;
        text-decoration: none;
        font-weight: bold;
    }
    .user-dropdown {
        position: relative;
        margin-left: 20px;
    }

    .user-icon {
        cursor: pointer;
        color: white;
        display: flex;
        align-items: center;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        right: 0;
        background-color: white;
        min-width: 160px;
        box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
        border-radius: 6px;
        z-index: 999;
    }

    .user-dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown-content a {
        padding: 12px 16px;
        display: block;
        color: black;
        text-decoration: none;
    }

    .dropdown-content a:hover {
        background-color: #f0f0f0;
    }
</style>

<!-- HTML phần <header> -->
<header style="display: flex; align-items: center; justify-content: space-between;">
    <div style="display: flex; align-items: center;">
        <img src="{{ asset('images/1.jpg') }}" alt="Logo" style="height: 50px; margin-right: 15px;">
        <h1 style="margin: 0;">Bảo Tàng Đá Quý</h1>
    </div>
    <nav style="display: flex; align-items: center;">
        <a href="{{ route('home') }}">Trang chủ</a>
        <a href="{{ route('news.index') }}">Bài viết</a>
        <a href="{{ route('ticket.index') }}">Trưng bày-Vé tham quan</a>
        @auth
    <div class="user-dropdown">
        <div class="user-icon">
            @if (Auth::user()->avatar)
                <img src="{{ asset('storage/' . Auth::user()->avatar) }}" 
                     alt="Avatar" 
                     style="width: 30px; height: 30px; border-radius: 50%; object-fit: cover;">
            @else
                <img src="https://via.placeholder.com/30" 
                     alt="Avatar" 
                     style="width: 30px; height: 30px; border-radius: 50%; object-fit: cover;">
            @endif
                <span style="margin-left: 5px;">{{ Auth::user()->name }}</span>
            </div>
            <div class="dropdown-content">
            <a href="{{ route('users.profile') }}">Thông tin cá nhân</a>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                   Đăng xuất
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
        @endauth
    </nav>
</header>

<body style="font-family: 'Roboto', sans-serif; background-color: #fdf7ef;">
   

    {{-- NỘI DUNG --}}
    <div class="container my-5">
        <div class="row">
            {{-- Cột trái: hình ảnh sản phẩm --}}
            <div class="col-md-6">
                @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded shadow mb-3" alt="{{ $product->name }}">
                @else
                    <img src="{{ asset('images/no-image.png') }}" class="img-fluid rounded shadow mb-3" alt="No Image">
                @endif
            </div>

            {{-- Cột phải: chi tiết sản phẩm --}}
            <div class="col-md-6">
                <h2 class="text-danger">{{ $product->name }}</h2>
                <div class="mb-2">
                    {{-- Giả lập sao đánh giá --}}
                    @for ($i = 0; $i < 5; $i++)
                        <i class="fa{{ $i < 4 ? 's' : 'r' }} fa-star" style="color: gold;"></i>
                    @endfor
                </div>
                <h4 class="text-success mb-3">{{ number_format($product->price, 0, ',', '.') }} VNĐ</h4>

                <p><strong>Số lượng còn:</strong> {{ $product->quantity }}</p>
                <hr>
                <h5>Mô tả sản phẩm:</h5>
                <p>{{ $product->description }}</p>

                {{-- Nút đặt vé --}}
                <form action="{{ route('ticket.order', $product->id) }}" method="POST" class="mt-4">
    @csrf
    <div class="input-group mb-3" style="max-width: 200px;">
        <input type="number" name="quantity" class="form-control" min="1" max="{{ $product->quantity }}" value="1">
        <button type="submit" class="btn btn-danger">Đặt vé</button>
    </div>
</form>

            </div>
        </div>

        {{-- Dịch vụ tiện ích --}}
        <div class="row text-center mt-5">
            <div class="col-md-4">
                <img src="{{ asset('images/ship.png') }}" alt="Ship" width="40">
                <p class="fw-bold mt-2">SHIP HỎA TỐC</p>
                <p>Trong nội thành</p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('images/security.png') }}" alt="Secure" width="40">
                <p class="fw-bold mt-2">BẢO MẬT</p>
                <p>Bảo mật thông tin khách hàng</p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('images/return.png') }}" alt="Return" width="40">
                <p class="fw-bold mt-2">7 NGÀY ĐỔI TRẢ</p>
                <p>Đổi trực tiếp tại cửa hàng</p>
            </div>
        </div>
    </div>
    @if (session('success'))
    <div id="success-alert" class="alert alert-success">{{ session('success') }}</div>
@endif
@if (session('error'))
    <div id="error-alert" class="alert alert-danger">{{ session('error') }}</div>
@endif

<script>
    // Ẩn alert sau 3 giây
    setTimeout(function() {
        const successAlert = document.getElementById('success-alert');
        const errorAlert = document.getElementById('error-alert');

        if (successAlert) {
            successAlert.style.transition = 'opacity 0.5s ease';
            successAlert.style.opacity = '0';
            setTimeout(() => successAlert.remove(), 500);
        }

        if (errorAlert) {
            errorAlert.style.transition = 'opacity 0.5s ease';
            errorAlert.style.opacity = '0';
            setTimeout(() => errorAlert.remove(), 500);
        }
    }, 3000);
</script>
<!-- Nút quay lại danh sách sản phẩm -->
<a href="{{ route('ticket.index') }}" class="btn btn-secondary mt-2">
    <i class="fas fa-arrow-left"></i> Quay lại danh sách vé
</a>

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
<footer>
        &copy; {{ date('Y') }} Bảo Tàng Đá Quý.
    </footer>
</body>
</html>
