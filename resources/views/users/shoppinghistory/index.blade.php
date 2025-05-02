<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('storage/' . $setting->favicon) }}">
    
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<style>
     .silver-text {
        font-size: 50px;
  font-weight: bold;
  background: linear-gradient(90deg, #ccc, #fff, #999, #eee, #ccc);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
    }
    .pagination {
    background-color: transparent; 
    border: none; 
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
    background-color: #000;
    color: #e0e0e0;
    font-family: 'Arial', sans-serif;
    
}

.container {
    background-color: #111; /* Màu xám tối cho khung ngoài Booking History */
    padding: 20px;
    border-radius: 15px;
    max-width: 80%;
    margin: auto;
    margin-bottom: 50px;
}

.inner-container {
    background-color: #121212;
    padding: 30px;
    border-radius: 12px;
}

h4 {
    font-size: 24px;
    font-weight: bold;
    color: #ffcc00;
    margin-bottom: 20px;
}

.table {
    width: 100%;
    border-collapse: collapse;
    background-color: #000; /* Nền bảng màu đen */
    border-radius: 10px;
    overflow: hidden;
    color: #fff; /* Chữ trắng */
}

.table th, .table td {
    text-align: center;
    padding: 12px 18px;
    font-size: 14px;
    border: 1px solid #444;
}

.table th {
    background-color: #222; /* Header màu tối */
    color: #fff;
}

.table tbody tr {
    background-color: #111;
    transition: background-color 0.3s;
}

.table tbody tr:hover {
    background-color: #222;
}

.badge {
    padding: 6px 12px;
    font-size: 14px;
    border-radius: 12px;
    color: #fff;
}

.badge.bg-warning {
    background-color: #ff9800;
}

.badge.bg-success {
    background-color: #4caf50;
}

.badge.bg-danger {
    background-color: #f44336;
}

.badge.bg-secondary {
    background-color: #9e9e9e;
}

p {
    color: #fff;
    font-size: 16px;
    font-style: italic;
}

/* Tiêu đề "Booking History" */
.container h4 {
    font-size: 20px;
  font-weight: bold;
  background: linear-gradient(90deg, #ccc, #fff, #999, #eee, #ccc);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

/* Nội dung bảng */
.container .table th,
.container .table td {
    font-size: 16px; /* Tăng từ 14px lên 16px */
}

/* Chữ trong badge (ví dụ: Pending, Success,...) */
.container .badge {
    font-size: 15px; /* Tăng từ 14px lên 15px */
}

</style>

<!-- HTML phần <header> -->
<header style="display: flex; align-items: center; justify-content: space-between;">
<div style="display: flex; align-items: center;">
        <!-- Hiển thị logo -->
<img src="{{ asset('storage/' . $setting->logo) }}" alt="Logo Website" width="120">

<h1> {{ $setting->site_name ?? 'Website của bạn' }}</h1>
<button class="mobile-nav-toggle" onclick="toggleMobileNav()">
            &#9776; <!-- biểu tượng hamburger -->
        </button>
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
        <a href="{{ route('user.shoppinghistory.index') }}">Shopping History</a>
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
<body class="bg-black text-white">
    <div class="container py-5">
        <div class="bg-dark p-4 rounded shadow">
            <!-- Tiêu đề rõ ràng hơn với màu trắng và biểu tượng -->
            <h4 class="mb-4 text-white" style="font-size: 24px;">
            <i class="fa-solid fa-receipt"></i> Shopping History
            </h4>

            @if($shoppingHistory->isEmpty())
                <p class="text-white">Bạn chưa mua sản phẩm nào.</p>
            @else
                <table class="table table-dark table-bordered table-hover text-white">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Date booked</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($shoppingHistory as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td class="silver-text">{{ $item->shop->name ?? 'N/A' }}</td>
                                <td>{{ $item->quantity }}</td>
                                @php
                                    $statusColors = [
                                        'pending' => 'warning',
                                        'confirmed' => 'success',
                                        'canceled' => 'danger'
                                    ];
                                    $statusText = [
                                        'pending' => 'Pending',
                                        'confirmed' => 'Confirmed',
                                        'canceled' => 'Canceled'
                                    ];
                                    $status = $item->status ?? 'pending';
                                @endphp
                                <td>
                                    <span class="badge bg-{{ $statusColors[$status] ?? 'secondary' }}">
                                        {{ $statusText[$status] ?? 'Unknown' }}
                                    </span>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($item->purchased_at)->setTimezone('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
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
