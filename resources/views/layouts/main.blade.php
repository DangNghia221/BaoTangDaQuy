<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
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
    background-image: url('{{ asset("images/hero.jpg") }}');
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
    width: 1650px; /* tăng kích thước */
    height: 600px;
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


    </style>
</head>
<body>

<header style="display: flex; align-items: center; justify-content: space-between;">
    <div style="display: flex; align-items: center;">
        <img src="{{ asset('images/1.jpg') }}" alt="Logo" style="height: 50px; margin-right: 15px;">
        <h1 style="margin: 0;">Bảo Tàng Đá Quý</h1>
    </div>
    <nav>
        <a href="{{ route('home') }}">Trang chủ</a>
        <a href="{{ route('login.form') }}">Đăng nhập</a>
        <a href="{{ route('register.form') }}">Đăng ký</a>
        <a href="{{ route('news.index') }}">Bài viết</a>
 
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
            <p>Phố đi bộ Nguyễn Huệ, 68 Nguyễn Huệ,<br>Phường Bến Nghé, Quận 1, TP. HCM</p>
        </div>
        <div class="hero-phone">
            <img src="{{ asset('images/hangdong.jpg') }}" alt="Gọi điện">
        </div>
    </div>

    <!-- Breadcrumb -->
    <div class="breadcrumb">
        Trang chủ / <strong>Giới thiệu</strong>
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

</body>
</html>
