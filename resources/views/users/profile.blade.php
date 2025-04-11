<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thông tin cá nhân</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <button id="backToTopBtn" title="Lên đầu trang">
    <i class="fas fa-arrow-up"></i>
</button>

<script>
    const backToTopBtn = document.getElementById("backToTopBtn");

    window.addEventListener("scroll", () => {
        const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
        const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;

        // Nếu cuộn đến 80% thì hiển thị nút
        if (scrollTop / scrollHeight > 0.8) {
            backToTopBtn.classList.add("show");
        } else {
            backToTopBtn.classList.remove("show");
        }
    });

    backToTopBtn.addEventListener("click", () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
</script>


</head>
<body class="bg-gray-100">
<style>
     header {
        position: sticky;
        top: 0;
        z-index: 1000;
        background-color: #5D4037;
        }
 /* icon về đầu trang */
  #backToTopBtn {
    opacity: 0;
    visibility: hidden;
    position: fixed;
    bottom: 40px;
    right: 30px;
    z-index: 99;
    width: 50px;
    height: 50px;
    background-color: #b30000;
    color: white;
    border: none;
    outline: none;
    border-radius: 50%;
    font-size: 18px;
    cursor: pointer;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
    transition: opacity 0.5s ease, visibility 0.5s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

#backToTopBtn.show {
    opacity: 1;
    visibility: visible;
}

#backToTopBtn:hover {
    background-color: #8b0000;
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
<div class="bg-gray-100 py-20">

        <div class="max-w-5xl mx-auto p-6 bg-white shadow-xl rounded-2xl grid grid-cols-1 md:grid-cols-3 gap-6">
            
         <!-- Sidebar -->
<div class="flex flex-col items-center justify-center space-y-3">
    @if ($user->avatar)
        <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" class="w-24 h-24 rounded-full shadow">
    @else
        <img src="https://via.placeholder.com/100" alt="avatar" class="w-24 h-24 rounded-full shadow">
    @endif

    <div class="text-lg font-semibold">{{ $user->name }}</div>
    <div class="text-gray-500">{{ $user->email }}</div>
    <div class="text-green-600 font-medium">Trạng thái: Đang hoạt động</div>
</div>


            <!-- Thông tin -->
            <div class="md:col-span-2">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-bold text-red-600">Thông tin cá nhân</h2>
                    <a href="{{ route('users.profile.edit') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                       Cập nhật
                    </a>
                </div>
                <div class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm text-gray-600">Họ và tên</label>
                            <div class="w-full border rounded px-3 py-2 bg-gray-100">{{ $user->name }}</div>
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600">Số điện thoại</label>
                            <div class="w-full border rounded px-3 py-2 bg-gray-100">{{ $user->phone ?? 'Chưa cập nhật' }}</div>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm text-gray-600">Email</label>
                            <div class="w-full border rounded px-3 py-2 bg-gray-100">{{ $user->email }}</div>
                        </div>
                    </div>
                </div>
            </div>

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


</main>

    <footer>
        &copy; {{ date('Y') }} Bảo Tàng Đá Quý.
    </footer>
</html>
