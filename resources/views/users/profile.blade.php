<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Personal information</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- Favicon -->
<link rel="icon" type="image/png" href="{{ asset('storage/' . $setting->favicon) }}">
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
    footer {
    padding: 10px 20px;
}

      .silver-text {
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
    @media (max-width: 768px) {
    .sitemap-wrapper iframe {
        width: 50px !important;
        height: 25px !important;
    }
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
<body style="font-family: 'Roboto', sans-serif; background-color: #000; color: #ccc;">

    <div class="py-20">
    <div style="background-color:#1a1a1a; color: white; padding: 40px 20px;" class="max-w-5xl mx-auto shadow-xl rounded-2xl grid grid-cols-1 md:grid-cols-3 gap-6">            
            <!-- Sidebar -->
            <div class="flex flex-col items-center justify-center space-y-3">
                @if ($user->avatar)
                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" class="w-24 h-24 rounded-full shadow-lg">
                @else
                    <img src="https://via.placeholder.com/100" alt="avatar" class="w-24 h-24 rounded-full shadow-lg">
                @endif

                <div class="text-lg font-semibold text-white">{{ $user->name }}</div>
                <div class="text-gray-400">{{ $user->email }}</div>
               
            </div>

            <!-- Thông tin -->
            <div class="md:col-span-2">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="silver-text">Personal information</h2>
                    <a href="{{ route('users.profile.edit') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                       Update
                    </a>
                </div>
                <div class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm text-gray-300">Full name</label>
                            <div class="w-full border rounded px-3 py-2 bg-gray-800 text-white">{{ $user->name }}</div>
                        </div>
                        <div>
                            <label class="block text-sm text-gray-300">Phone Number</label>
                            <div class="w-full border rounded px-3 py-2 bg-gray-800 text-white">{{ $user->phone ?? 'Chưa cập nhật' }}</div>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm text-gray-300">Email</label>
                            <div class="w-full border rounded px-3 py-2 bg-gray-800 text-white">{{ $user->email }}</div>
                        </div>
                    </div>
                </div>
            </div>

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
        <div class="sitemap-wrapper">
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
