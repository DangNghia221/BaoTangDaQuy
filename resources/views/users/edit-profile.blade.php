<!DOCTYPE html>
<html>
<head>
    <title>Chỉnh sửa thông tin cá nhân</title>
    <style>
         header {
        position: sticky;
        top: 0;
        z-index: 1000;
        background-color: #5D4037;
        }
        /* Reset mặc định */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

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

        .container {
            max-width: 600px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .form-actions {
            text-align: right;
        }

        button {
            padding: 10px 20px;
            background: #007BFF;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }

        .avatar-preview {
            margin-top: 10px;
        }

        .avatar-preview img {
            max-height: 100px;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <!-- Header không còn khoảng trắng phía trên -->
    <header style="display: flex; align-items: center; justify-content: space-between;">
        <div style="display: flex; align-items: center;">
            <img src="{{ asset('images/1.jpg') }}" alt="Logo" style="height: 50px; margin-right: 15px;">
            <h1 style="margin: 0; font-size: 24px;">Bảo Tàng Đá Quý</h1>
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
                    <a href="{{ route('user.invoices.index') }}">Hóa đơn của tôi</a>
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

    <!-- Nội dung chính -->
    <div class="container">
        <h2>Chỉnh sửa thông tin cá nhân</h2>
        <form action="{{ route('users.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Họ và tên</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" required>
            </div>

            <div class="form-group">
                <label for="phone">Số điện thoại</label>
                <input type="text" name="phone" id="phone" value="{{ $user->phone }}">
            </div>

            <div class="form-group">
                <label for="avatar">Ảnh đại diện</label>
                <input type="file" name="avatar" id="avatar" accept="image/*">
                @if($user->avatar)
                    <div class="avatar-preview">
                        <p>Ảnh hiện tại:</p>
                        <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar">
                    </div>
                @endif
            </div>

            <div class="form-actions">
                <button type="submit">Lưu thông tin</button>
            </div>
        </form>
    </div>

    
    <footer style="background-color: #7b1e1e; color: white; padding: 40px 20px;">
    <div style="display: flex; flex-wrap: wrap; justify-content: space-between; gap: 20px;">
    <!-- Bên trái: Thông tin bảo tàng -->
    <div style="flex: 1; min-width: 280px; margin-bottom: 20px; text-align: left; padding-left: 80px;">
        <h3 style="color: #ffd700; margin-bottom: 20px;">Bảo Tàng Đỗ Hùng</h3>
        
        <p style="margin-bottom: 12px; line-height: 1.6;"><strong>Địa chỉ:</strong> 44 Đ. Nguyễn Khuyến, Tân An, Ninh Kiều, Cần Thơ 900000</p>
        <p style="margin-bottom: 12px; line-height: 1.6;"><strong>Tầng trệt (G):</strong> Đá quý Việt Nam</p>
        <p style="margin-bottom: 12px; line-height: 1.6;"><strong>Tầng 1-3:</strong> Đá quý nổi tiếng</p>
        <p style="margin-bottom: 12px; line-height: 1.6;">
            <a href="https://www.google.com/maps/place/Museum+of+Tarot+..." style="color: #ffd700;">Xem bản đồ tại đây</a>
        </p>
        <p style="margin-bottom: 12px; line-height: 1.6;"><strong>Giờ mở cửa:</strong> 08:30 – 21:00 Tất cả các ngày trong tuần</p>
        <p style="margin-bottom: 12px; line-height: 1.6;"><strong>Email:</strong> nghia@gmail.com</p>
        <p style="margin-bottom: 12px; line-height: 1.6;"><strong>Hotline:</strong> 
            <a href="tel:1900633077" style="color: #ffd700;">1900 633 077</a>
        </p>
        <p style="margin-bottom: 12px; line-height: 1.6;"><strong>Số điện thoại:</strong> 
            <a href="tel:0589151934" style="color: #ffd700;">0589 151 934</a>
        </p>
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
