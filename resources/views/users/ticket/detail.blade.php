<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
<!-- Favicon -->
<link rel="icon" type="image/png" href="{{ asset('storage/' . $setting->favicon) }}">
    <!-- Font Awesome -->
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
<style>
      .post-content p,
        .post-content li,
        .post-content span,
        .post-content h1,
        .post-content h2,
        .post-content h3 {
            color: #D3D3D3 !important;
        }

        .post-content a {
           
            text-decoration: underline;
        }
     header {
        position: sticky;
        top: 0;
        z-index: 1000;
        background-color: #fff;
        padding: 5px; 
        }
 /* icon về đầu trang */
 nav a {
        color: white;
        margin: 0 10px;
        text-decoration: none;
        font-weight: bold;
        position: relative;
        padding-bottom: 5px;
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
        background-color: #f1f1f1;
        color: #333;
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
        background-color: #4CAF50;
        color: white;
    }

    #backToTopBtn i {
        font-size: 24px;
    }
    header, footer {
        background-color: #000;
        color: white;
        padding: 20px;
        text-align: center;
    }
    header h1{
             font-size: 28px; 
            color :white
           
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

<!-- HTML phần <header> -->
<header style="display: flex; align-items: center; justify-content: space-between;">
<div style="display: flex; align-items: center;">
        <!-- Hiển thị logo -->
<img src="{{ asset('storage/' . $setting->logo) }}" alt="Logo Website" width="120">

<h1> {{ $setting->site_name ?? 'Website của bạn' }}</h1>

</div>
    <nav style="display: flex; align-items: center;">
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('news.index') }}">Post</a>
    <a href="{{ route('ticket.index') }}">Exhibition-Ticket</a>
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
        <a href="{{ route('user.invoices.index') }}">My bill</a>
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
    </nav>
</header>
<body style="font-family: 'Roboto', sans-serif; background-color: #000; color: #ccc;">

    {{-- NỘI DUNG --}}
    <div class="container my-5">
        <div class="row">
            {{-- Cột trái: hình ảnh sản phẩm --}}
            <div class="col-md-6">
    @if ($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" 
             class="img-fluid rounded shadow mb-3" 
             alt="{{ $product->name }}" 
             style="border: 2px solid #333; width: 50%; max-width: 300px; margin-left: 80px;">
    @else
        <img src="{{ asset('images/no-image.png') }}" 
             class="img-fluid rounded shadow mb-3" 
             alt="No Image"
             style="border: 2px solid #333; width: 50%; max-width: 300px; margin-left: 80px;">
    @endif
</div>


            {{-- Cột phải: chi tiết sản phẩm --}}
            <div class="col-md-6" style="background-color: #1a1a1a; padding: 20px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.4);">
                <h2 class="text-danger">{{ $product->name }}</h2>

                {{-- Bỏ phần đánh giá sao --}}

                <h4 class="mb-3" style="color: #4caf50;">{{ number_format($product->price, 0, ',', '.') }} VNĐ</h4>

                <p><strong style="color: #bbb;">Quantity left:</strong> {{ $product->quantity }}</p>
                <hr style="border-color: #444;">
                <h5 style="color: #fff;">Product Description:</h5>
                <p>{{ $product->description }}</p>

                {{-- Nút đặt vé --}}
                <form action="{{ route('ticket.order', $product->id) }}" method="POST" class="mt-4">
                    @csrf
                    <div class="input-group mb-3" style="max-width: 200px;">
                        <input type="number" name="quantity" class="form-control" min="1" max="{{ $product->quantity }}" value="1">
                        <button type="submit" class="btn btn-danger">Book tickets</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Dịch vụ tiện ích --}}
        <div class="row text-center mt-5" style="color: #ccc;">
            <div class="col-md-4">
                <img src="{{ asset('images/ship.png') }}" alt="Ship" width="40">
                <p class="fw-bold mt-2" style="color: #fff;">Express Shipping</p>
                <p>In the city center</p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('images/security.png') }}" alt="Secure" width="40">
                <p class="fw-bold mt-2" style="color: #fff;">Security</p>
                <p>Customer Information Security</p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('images/return.png') }}" alt="Return" width="40">
                <p class="fw-bold mt-2" style="color: #fff;">7-Day Return</p>
                <p>Exchange directly at the store</p>
            </div>
        </div>
    </div>

    {{-- Thông báo --}}
    @if (session('success'))
        <div id="success-alert" class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div id="error-alert" class="alert alert-danger">{{ session('error') }}</div>
    @endif
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
</body>
</html>
