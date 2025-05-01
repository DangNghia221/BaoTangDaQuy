<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shop Categories</title>
    <style>
          .pagination {
    background-color: transparent; /* Loại bỏ background */
    border: none; /* Loại bỏ viền */
}

.pagination li a,
.pagination li span {
    background-color: transparent !important; /* Loại bỏ background của các liên kết */
    color: white !important; /* Đặt màu chữ thành trắng */
    border: none !important; /* Đảm bảo không có viền */
}

.pagination li.active a,
.pagination li.active span {
    color: white !important; /* Đặt màu chữ trắng cho trang hiện tại */
}

    .card-title {
        font-size: 20px;
  font-weight: bold;
  background: linear-gradient(90deg, #ccc, #fff, #999, #eee, #ccc);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
    }
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
    
    body {
    font-family: Arial, sans-serif;
    background: #f9f9f9;
    margin: 0;
    padding: 0;
    
}

.category-container {
    max-width: 1000px;
    margin: 0 auto;
    padding: 30px 20px;
}

.category-banner {
    width: 100%;
    overflow: hidden;
    border-radius: 8px;
    margin-bottom: 30px;
}

.category-banner img {
    width: 100%;
    height: 320px;
    object-fit: cover;
    display: block;
    border-radius: 8px;
}

h2 {
    font-size: 28px;
    margin-bottom: 15px;
    text-align: left;
    font-weight: bold;
}

p {
    font-size: 16px;
    line-height: 1.6;
    text-align: left;
    color: #555;
}



h1 {
    font-size: 36px;
    margin-bottom: 10px;
    text-align: left;
    font-weight: bold;
}




.grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr); /* Luôn hiển thị 3 cột */
    gap: 40px;
    justify-content: center;
    padding: 0 40px;
    margin-bottom: 50px; 
}
.category {
    background: #1a1a1a; /* Màu nền tối cho khung */
    color: white;        /* Chữ trắng */
    text-align: center;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(255, 255, 255, 0.1);
    transition: transform 0.3s ease;
    padding-bottom: 20px;
}

.category:hover {
    transform: translateY(-5px);
}

.circle-img {
    width: 180px;
    height: 180px;
    margin: 0 auto 15px;
    border-radius: 50%;
    overflow: hidden;
    border: 4px solid #f0f0f0;
}

.circle-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.category h3 {
    margin: 10px 0 5px;
    font-size: 20px;
    color: white; /* Chữ tiêu đề trắng */
}

.shop-now {
    color: #4db8ff; /* Màu xanh dương nhẹ cho link */
    font-weight: bold;
    text-decoration: none;
}

.shop-now:hover {
    text-decoration: underline;
}
.silver-text {
        font-size: 30px;
  font-weight: bold;
  background: linear-gradient(90deg, #ccc, #fff, #999, #eee, #ccc);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
    }
    .shop-items {
    display: grid;
    grid-template-columns: repeat(3, 1fr); /* 3 sản phẩm 1 hàng */
    gap: 20px;
    margin-top: 30px;
}

.shop-item {
  width: 100%;
  max-width: 100%; /* cho phép nó chiếm toàn bộ cột */
  border: 1px solid #ddd;
  border-radius: 5px;
  padding: 15px;
  text-align: center;
  background: #fff;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}


  .shop-item:hover {
    transform: translateY(8px);
    box-shadow: 0 6px 12px rgba(0,0,0,0.2);
  }

  .shop-item img {
    max-width: 100%;
    height: auto;
    object-fit: cover;
  }

  .shop-item h3 {
    font-size: 16px;
    margin: 10px 0;
    font-weight: bold;
  }

  .shop-item .price {
    font-size: 14px;
    margin: 5px 0;
    color: #333;
  }

  .exclusive-label {
    display: inline-block;
    background: black;
    color: white;
    padding: 4px 8px;
    font-size: 12px;
    margin-top: 10px;
  }
    </style>
</head>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Tickets</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
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

<!-- HTML phần <header> -->
<header style="display: flex; align-items: center; justify-content: space-between;">
<div style="display: flex; align-items: center;">
        <!-- Hiển thị logo -->
<img src="{{ asset('storage/' . $setting->logo) }}" alt="Logo Website" width="120">

<h1> {{ $setting->site_name ?? 'Website của bạn' }}</h1>

</div>
    <nav style="display: flex; align-items: center;">
    <a href="{{ route('home') }}">Home</a>
    <a href="{{ route('news.index') }}">Our Documentations</a>
    <a href="{{ route('ticket.index') }}">Exhibition-Events</a>
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
  <div class="category-container" style="text-align: center;">
  <div class="category-banner">
   <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" style="width: 1200px; height: 322px; object-fit: cover;">
</div>


    <h2>{{ $category->name }}</h2>
    <p>{!! nl2br(e($category->description)) !!}</p>

    <div class="shop-items">
      @foreach ($category->shops as $shop)
        <div class="shop-item">
          @if ($shop->image)
            <img src="{{ asset('storage/' . $shop->image) }}" alt="{{ $shop->name }}">
          @endif
          <h3>{{ $shop->name }}</h3>
          {{ number_format($shop->price, 0) }} VND
        </div>
      @endforeach
    </div>
  </div>
  
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

</html>
