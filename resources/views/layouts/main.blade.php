<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="{{ asset('storage/' . $setting->favicon) }}">
    <!-- Nút trở lên đầu trang -->
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
    <style>
         
 /* icon đầu trang */
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
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
        }
        header {
        position: sticky;
        top: 0;
        z-index: 1000;
        background-color: #5D4037;
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
        main {
            padding: 40px 20px;
            text-align: center;
        }
        section {
            margin: 40px 0;
        }
        .section-title {
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
        }
        .info-box {
            background: #fff;
            padding: 20px;
            margin: 0 auto;
            border-radius: 10px;
            max-width: 800px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        /* Hero Section */
       /* Hero Section */
.hero {
    position: relative;
    width: 100%;
    height: 90vh;
    background-image: url('{{ asset("images/hangdong.jpg") }}');
    background-size: cover;
    background-position: center;
    display: flex;
    justify-content: center;
    align-items: center;
}
.hero-phone {
    position: absolute;
    bottom: 30px;
    left: 30px;
    z-index: 1;
}

.hero-phone img {
    width: 1450px; 
    height: 00px;
    border-radius: 15px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
}

.hero-info {
    position: absolute;
    bottom: 40px;
    right: 40px;
    background-color: rgba(0, 0, 0, 0.6);
    color: white;
    padding: 20px;
    border-radius: 10px;
    max-width: 300px;
    z-index: 2; /* đảm bảo nó nổi hơn ảnh nếu cần */
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
</head>
<body>

<header style="display: flex; align-items: center; justify-content: space-between;">
    <div style="display: flex; align-items: center;">
        <!-- Hiển thị logo -->
<img src="{{ asset('storage/' . $setting->logo) }}" alt="Logo Website" width="120">

<!-- Favicon -->
<link rel="icon" type="image/png" href="{{ asset('storage/' . $setting->favicon) }}">
<h1> {{ $setting->site_name ?? 'Website của bạn' }}</h1>

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

    <!-- Hero Section -->
    <div class="hero">
        <div class="hero-info">
            <p><i class="fas fa-clock"></i> <strong>Giờ mở cửa</strong></p>
            <p>08:30 – 21:00</p>
            <p>Tất Cả Các Ngày Trong Tuần</p>
            <br>
            <p><i class="fas fa-map-marker-alt"></i> <strong>Địa chỉ</strong></p>
            <p>{{ $setting->description }}</p>
            <address>{{ $setting->address }}</address>

        </div>
        <div class="hero-phone">
            <img src="{{ asset('images/hangdong.jpg') }}" alt="Gọi điện">
        </div>
    </div>

  
    <main style="background-color: #fdf7ef; padding: 40px 20px;">
    <!-- Giới thiệu chính -->
    <section style="display: flex; flex-wrap: wrap; gap: 40px; align-items: center; justify-content: center;">
        <!-- Nội dung giới thiệu -->
        <div style="flex: 1; min-width: 300px; max-width: 600px;">
            <h2 style="color: #9b1c1c; font-size: 32px;">BẢO TÀNG ĐÁ QUÝ</h2>
            <p>
            Nằm trên tầng 5 của một tòa tháp nổi bật giữa lòng Hà Nội, bảo tàng đá quý là điểm đến hấp dẫn dành cho những ai yêu thích vẻ đẹp tự nhiên và giá trị văn hóa từ đá quý. Không gian trưng bày được thiết kế theo phong cách hang động độc đáo, mang đến trải nghiệm mới lạ cho du khách. Hành trình tham quan được chia thành 4 khu vực chính: khu vực đầu tiên giới thiệu quá trình khai thác và sử dụng đá quý từ thời nguyên thủy; khu thứ hai tái hiện việc khai thác thủ công từ lòng sông suối; khu thứ ba là mô hình hầm lò hiện đại với thiết bị máy móc; và cuối cùng là khu trưng bày các sản phẩm đá quý đã qua chế tác đầy tinh xảo.            </p>
        </div>

        <!-- Hình ảnh lớn -->
       <!-- Hình ảnh lớn -->
<div style="flex: 1; min-width: 300px; max-width: 700px; margin-top: 50px;">
    <img src="{{ asset('images/rong.png') }}" alt="Tượng rồng đá quý"
         style="width: 100%; border-radius: 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.2);">
</div>

    </section>

   <!-- Lưới hình ảnh nhỏ bên dưới -->
<section style="margin-top: 60px;">
    <div style="display: flex; flex-wrap: wrap; gap: 30px; justify-content: center; align-items: stretch;">
        <!-- Ảnh rùa -->
        <div style="flex: 1; min-width: 300px; max-width: 500px;">
            <img src="{{ asset('images/rua.png') }}" alt="Hình ảnh 1"
                 style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;">
        </div>

        <!-- Nội dung văn bản kế bên ảnh rùa -->
        <div style="flex: 1; max-width: 500px;">
            <h3 style="color: #9b1c1c;">Cổ Vật Trang Sức 54 Dân Tộc</h3>
            <p>
                Lại mang đến một góc nhìn đa dạng về văn hóa các dân tộc. Với hơn 20 năm sưu tầm và nghiên cứu, 
                bảo tàng đã tập hợp được một bộ sưu tập trang sức đồ sộ, phản ánh sự phong phú và độc đáo của 
                văn hóa trang sức Việt Nam. Mỗi bộ trang sức không chỉ là một tác phẩm nghệ thuật mà còn là 
                minh chứng sinh động cho sự khéo léo, tinh tế của các nghệ nhân dân tộc.
            </p>
            <h3 style="color: #9b1c1c; margin-top: 20px;">Cổ Vật Hoàng Cung Triều Nguyễn</h3>
            <p>
                Tạo điều kiện cho du khách đắm mình trong không gian cung đình nguy nga, được chiêm ngưỡng 
                những hiện vật quý giá như trang phục, đồ dùng, nội thất hoàng gia. Mỗi hiện vật đều kể một câu 
                chuyện về cuộc sống xa hoa, quyền quý của các bậc đế vương và những sự kiện lịch sử quan trọng. 
                Đặc biệt, các góc chụp hình độc đáo như ngai vàng, kiệu hoàng hậu, xe kéo hoàng hậu sẽ giúp bạn 
                tạo nên những bức ảnh kỷ niệm ấn tượng.
            </p>
        </div>
    </div>
</section>
<section style="background-color: #7b1e1e; color: white; padding: 60px 20px;">
    <div style="display: flex; flex-wrap: wrap; align-items: flex-start; justify-content: center; gap: 40px;">
        
        <!-- Phần nội dung bên trái -->
        <div style="flex: 1; min-width: 300px; max-width: 600px; text-align: left;">
        <p style="font-size: 18px; line-height: 1.7; text-align: left; margin-bottom: 30px;">
                
Đến thời điểm này, tôi không còn là một nhà sưu tầm, hay một người thường thức cổ vật nữa. Tôi đặt mình là một người có sứ mệnh phải giữ gìn, phát huy bằng cách giới thiệu các cổ vật ra công chúng. Chính vì vậy tôi thành lập Bảo tàng Trang sức 54 dân tộc Việt Nam và Bảo tàng Hoàng cung triều Nguyễn.
            </p>
            
            <p style="font-size: 18px; line-height: 1.7; text-align: left; margin-bottom: 30px;">
                Bảo tàng không chỉ là nơi lưu giữ những hiện vật quý giá mà còn là hiện thân cho những ước mơ và hoài bão lớn lao. 
                Tôi hy vọng rằng đứa con tinh thần này sẽ góp phần giữ gìn và lan tỏa tinh thần văn hóa Việt Nam đến thế hệ hôm nay và mai sau, 
                là điểm đến văn hóa, lịch sử quảng bá Việt Nam đến gần với bạn bè quốc tế.
            </p>

            <hr style="border-color: white; margin: 30px 0;">

            <h3 style="color: #ffd700; font-size: 26px; margin: 0;">Nhà Sáng Lập Đặng Nghĩa</h3>
            <p style="font-size: 16px; margin-top: 5px;">Chuyên gia thâm niên hơn 30 năm nghiên cứu sưu tầm cổ vật.</p>
        </div>

        <!-- Phần hình ảnh bên phải -->
        <div style="flex: 1; min-width: 250px; max-width: 400px;">
            <img src="{{ asset('images/nhasanglap.jpg') }}" alt="Nhà sáng lập"
                 style="width: 100%; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.4);">
        </div>

    </div>
    
</section>
<footer style="background-color: #7b1e1e; color: white; padding: 40px 20px;">
    <div style="display: flex; flex-wrap: wrap; justify-content: space-between; gap: 20px;">
        
        <!-- Bên trái: Thông tin bảo tàng -->
        <div style="flex: 1; min-width: 280px; margin-bottom: 20px; text-align: left;padding-left: 80px;">
            <h3 style="color: #ffd700;">Bảo Tàng Đặng Nghĩa</h3>
            <p><strong>Địa chỉ:</strong> {{ $setting->address }}</p>
            <p><strong>Tầng trệt (G):</strong> Đá quý Việt Nam</p>
            <p><strong>Tầng 1-3:</strong> Đá quý nổi tiếng</p>
            <p><a href="https://www.google.com/maps/place/Museum+of+Tarot+-+B%E1%BA%A3o+T%C3%A0ng+Tarot/@10.034515,105.7806985,17z/data=!4m6!3m5!1s0x31a062a012ce1a7f:0x94227f06590edd93!8m2!3d10.0344872!4d105.783198!16s%2Fg%2F11bz092swr?hl=vi&entry=ttu&g_ep=EgoyMDI1MDQwMi4xIKXMDSoJLDEwMjExNDU1SAFQAw%3D%3D" style="color: #ffd700;">Xem bản đồ tại đây</a></p>
            <p><strong>Giờ mở cửa:</strong> 08:30 – 21:00 Tất cả các ngày trong tuần</p>
            <p><strong>Email:</strong> {{ $setting->email }}</p>
            <p><strong>Hotline:</strong> <a href="tel:1900633077" style="color: #ffd700;">1900 633 077</a></p>
            <p><strong>Số điện thoại:</strong> {{ $setting->phone }}</p>
            <p><strong>Thông tin kinh doanh:</strong> {!! $setting->business_info !!}</p>
        </div>

        <!-- Bên phải: Bản đồ -->
        <div style="flex: 1; min-width: 300px;">
    <div style="width: 300px; height: 600px;">
        {!! $setting->sitemap !!}
    </div>
</div>

    </div>
</footer>


</main>

    <footer>
        &copy; {{ date('Y') }} Bảo Tàng Đá Quý.
    </footer>

</body>
</html>
