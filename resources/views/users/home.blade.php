<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
    .silver-text {
        font-size: 40px;
  font-weight: bold;
  background: linear-gradient(90deg, #ccc, #fff, #999, #eee, #ccc);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
    }
    nav a {
    color: white;
    margin: 0 10px;
    text-decoration: none;
    font-weight: bold;
    position: relative;
    padding-bottom: 5px; /* Khoảng cách cho đường dưới */
}

nav a:hover {
    color: white;
}

nav a:hover::after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 2px;
    background-color: white;
    animation: underline-animation 0.3s ease-in-out;
}

@keyframes underline-animation {
    from {
        width: 0;
    }
    to {
        width: 100%;
    }
}
#backToTopBtn {
    opacity: 0;
    visibility: hidden;
    position: fixed;
    bottom: 40px;
    right: 30px;
    z-index: 99;
    width: 50px;
    height: 50px;
    background-color: #f1f1f1; /* Màu nền sáng để nổi bật trên nền đen */
    color: #333; /* Màu biểu tượng tối */
    border: none;
    outline: none;
    border-radius: 50%;
    font-size: 18px;
    cursor: pointer;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
    transition: opacity 0.5s ease, visibility 0.5s ease, background-color 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

#backToTopBtn.show {
    opacity: 1;
    visibility: visible;
}

#backToTopBtn:hover {
    background-color: #4CAF50; /* Màu khi hover, có thể dùng xanh lá cây để nổi bật */
    color: white; /* Đổi màu biểu tượng khi hover */
}

#backToTopBtn i {
    font-size: 24px; /* Thay đổi kích thước biểu tượng cho dễ nhìn */
}

        body {
            font-family: 'Arial', sans-serif;
            background-color: #000;
            margin: 0;
        }
        header {
        position: sticky;
        top: 0;
        z-index: 1000;
        background-color: #000;
        padding: 5px; 
        
        }
        header h1{
             font-size: 28px; 
            color :white
           
        }
        footer {
            background-color: #000;
            color: white;
            padding: 10px;
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
.btn-book-now {
    display: inline-block;
    padding: 10px 20px;
    background-color: white; /* Màu nền trắng */
    color: black; /* Màu chữ đen */
    font-size: 16px;
    font-weight: bold;
    text-decoration: none;
    border: 2px solid black; /* Đặt viền đen xung quanh nút */
    border-radius: 5px; /* Tạo các góc bo tròn */
    transition: background-color 0.3s, color 0.3s, border-color 0.3s; /* Hiệu ứng chuyển màu khi hover */
    margin-top: 20px; /* Khoảng cách phía trên */
}

.btn-book-now:hover {
    background-color: black; /* Màu nền chuyển thành đen khi hover */
    color: white; /* Màu chữ chuyển thành trắng khi hover */
    border-color: white; /* Viền chuyển thành trắng khi hover */
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
        background-color: black;
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
        color: white;
        text-decoration: none;
    }

    .dropdown-content a:hover {
        background-color: #333;
    }

    </style>
</head>


<header style="display: flex; align-items: center; justify-content: space-between;">
    <div style="display: flex; align-items: center;">
        <!-- Hiển thị logo -->
<img src="{{ asset('storage/' . $setting->logo) }}" alt="Logo Website" width="120">

<!-- Favicon -->
<link rel="icon" type="image/png" href="{{ asset('storage/' . $setting->favicon) }}">
<h1> {{ $setting->site_name ?? 'Website của bạn' }}</h1>

    </div>
    <nav style="display: flex; align-items: center;">
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('news.index') }}">Our Documentations</a>
    <a href="{{ route('ticket.index') }}">Collections</a>
    <a href="{{ route('categoryshop.index') }}">Shop</a>
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
        <a href="{{ route('users.profile') }}">Personal information</a>
        <a href="{{ route('user.invoices.index') }}">Booking History</a>
        <a href="{{ route('history.index') }}">History</a>
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
           Log out
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</div>
@endauth

@guest
<div class="user-dropdown">
    <div class="user-icon">
    <i class="fas fa-user"></i> <span style="margin-left: 5px;">Account</span>
    </div>
    <div class="dropdown-content">
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    </div>
</div>
@endguest



</nav>

</header>
<body>
    <!-- Hero Section -->
    <div class="hero">
        <div class="hero-info">
            <p><i class="fas fa-clock"></i> <strong>Opening hours</strong></p>
            <p>08:30 – 21:00</p>
            <p>All Days of the Week</p>
            <br>
            <p><i class="fas fa-map-marker-alt"></i> <strong>Address</strong></p>
            <p>{{ $setting->description }}</p>
            <address>{{ $setting->address }}</address>
            <a href="{{ route('book.index') }}" class="btn-book-now">Book Now</a>


        </div>
        <div class="hero-phone">
            <img src="{{ asset('images/hangdong.jpg') }}" alt="Gọi điện">
        </div>
    </div>

  
    <main style="background-color: #000; padding: 40px 20px; color:#fff">
    <!-- Giới thiệu chính -->
    <!-- Phần giới thiệu bảo tàng -->
<section style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 40px; align-items: center; justify-content: center;">
    <!-- Nội dung giới thiệu -->
    <div>
        <h2 class="silver-text">GEM MUSEUM</h2>
        <p>
            Located on the 5th floor of a prominent tower in the heart of Hanoi, the Gemstone Museum is an attractive destination for those who love the natural beauty and cultural value of gemstones. The exhibition space is designed in a unique cave style, offering visitors a fresh experience. The tour journey is divided into four main areas: the first area introduces the process of mining and using gemstones from prehistoric times; the second area re-enacts the manual mining process from riverbeds; the third area features a modern mine model with machinery and equipment; and finally, the last area displays finely crafted gemstone products.
        </p>
    </div>

    <!-- Hình ảnh lớn -->
    <div>
        <img src="{{ asset('images/rong.png') }}" alt="Tượng rồng đá quý"
             style="width: 100%; border-radius: 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.2); object-fit: cover;">
    </div>
</section>

<!-- Phần kho báu đá quý Việt Nam -->
<section style="margin-top: 60px; display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 30px; align-items: center;">
    <!-- Ảnh rùa -->
    <div>
        <img src="{{ asset('images/rua.png') }}" alt="Hình ảnh rùa"
             style="width: 100%; object-fit: cover; border-radius: 10px;">
    </div>

    <!-- Nội dung -->
    <div>
        <h3 class="silver-text" style="color:#BEBEBE; margin-top: 20px;">The Treasure of Vietnamese Gemstones</h3>
        <p>
            Explore the magical beauty of rare gemstones, where each mineral holds a story about the history, culture, and craftsmanship of Vietnam's ethnic groups. Each stone is not only a natural masterpiece but also a vivid testament to the elegance and skill of artisans through generations. Especially, you will have the chance to admire unique gemstone artworks that reflect the diversity and richness of ethnic cultures, creating an inspiring and memorable space.
        </p>
    </div>
</section>

<section style="background-color:  #1a1a1a; color: white; padding: 60px 20px;">
    <div style="display: flex; flex-wrap: wrap; align-items: flex-start; justify-content: center; gap: 40px;">
        
    <section style="display: flex; flex-wrap: wrap; gap: 40px; justify-content: center; align-items: stretch;">
    <!-- Phần nội dung bên trái -->
    <div style="flex: 1; min-width: 300px; max-width: 600px; text-align: left; display: flex; flex-direction: column; justify-content: center;">
    <p style="font-size: 18px; line-height: 1.7; margin-bottom: 30px;">
        The Janet Annenberg Hooker Hall of Geology, Gems, and Minerals is a mesmerizing exhibit that brings the world of geology and gemstones to life. Located within the Smithsonian National Museum of Natural History, this hall offers a deep dive into the geological wonders that have shaped our planet and the captivating beauty of gemstones.
    </p>
    <p style="font-size: 18px; line-height: 1.7; margin-bottom: 30px;">
        This narrated virtual tour takes you through the fascinating history of mineral formation, gemstone discovery, and the cutting-edge science behind their dazzling beauty. Whether you are a geology enthusiast or simply enchanted by the world of gemstones, this tour promises an enriching experience filled with knowledge and awe-inspiring visuals.
    </p>
    <hr style="border-color: white; margin: 30px 0;">
    <h3 class="silver-text" style="color:  #BEBEBE; font-size: 26px; margin: 0;">A Journey Through Earth's Treasures</h3>
    <p style="font-size: 16px; margin-top: 5px;">Explore the wonders of geology and the artistry of gemstones, where science and beauty come together.</p>
</div>



    <!-- Phần video bên phải -->
    <div style="flex: 1; min-width: 250px; max-width: 700px; display: flex; align-items: center;">
    <video controls preload="auto" style="width: 100%; height: auto; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.4);">
    <source src="{{ asset('videos/videodaquy.mp4') }}" type="video/mp4">
    Trình duyệt của bạn không hỗ trợ video.
</video>


    </div>
    
    </div>
</section>  
</section>

</body>
<footer style="background-color:#1a1a1a; color: white; padding: 40px 20px;">
    <div style="display: flex; flex-wrap: wrap; justify-content: space-between; gap: 20px;">
        
        <!-- Bên trái: Thông tin bảo tàng -->
        <div style="flex: 1; min-width: 280px; margin-bottom: 20px; text-align: left;padding-left: 80px;">
            <h3 style="color:  #BEBEBE;">Dang Nghia Museum</h3>
            <p><strong>Address:</strong> <a style="color:  #BEBEBE;">{{ $setting->address }} </a></p>
            <p><strong>Ground floor (G):</strong> <a style="color:  #BEBEBE;">Vietnam Gemstones</a></p>
            <p><strong>Floor 1-3:</strong> <a style="color:  #BEBEBE;">Famous Gemstones</a></p>
            <p><a href="https://www.google.com/maps/place/Museum+of+Tarot+-+B%E1%BA%A3o+T%C3%A0ng+Tarot/@10.034515,105.7806985,17z/data=!4m6!3m5!1s0x31a062a012ce1a7f:0x94227f06590edd93!8m2!3d10.0344872!4d105.783198!16s%2Fg%2F11bz092swr?hl=vi&entry=ttu&g_ep=EgoyMDI1MDQwMi4xIKXMDSoJLDEwMjExNDU1SAFQAw%3D%3D" style="color: #BEBEBE;">See map here</a></p>
            <p><strong>Opening hours:</strong><a style="color:  #BEBEBE;"> 08:30 – 21:00 All days of the week</a></p>
            <p><strong>Email:</strong> <a style="color:  #BEBEBE;">{{ $setting->email }}</a></p>
            <p><strong>Hotline:</strong> <a href="tel:1900633077" style="color:  #BEBEBE;">1900 633 077</a></p>
            <p><strong>Phone number:</strong><a style="color:  #BEBEBE;"> {{ $setting->phone }}</a> </p>
            <p><strong>Business information:</strong> <a style="color:  #BEBEBE;">{!! $setting->business_info !!}</a></p>
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
        &copy; {{ date('Y') }} Gem Museum.
    </footer>

</html>
