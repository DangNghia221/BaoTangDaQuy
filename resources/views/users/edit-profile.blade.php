<!DOCTYPE html>
<html>
<head>
    <title>Edit personal information</title>
 
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
     .silver-text {
        font-size: 30px;
  font-weight: bold;
  background: linear-gradient(90deg, #ccc, #fff, #999, #eee, #ccc);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
    }
     body {
    background-color: #000;
    color: #D3D3D3;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.container {
    background-color: #1a1a1a;
    max-width: 800px;
    margin: 30px auto;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
    
}
.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #eee;
}

.form-group input[type="text"],
.form-group input[type="file"],
.form-group input[type="password"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    background-color: #222;
    border: 1px solid #444;
    color: #fff;
    border-radius: 4px;
}


.avatar-preview img {
    max-width: 100px;
    border-radius: 10px;
    margin-top: 10px;
}

.form-actions button {
    background-color: #444;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.form-actions button:hover {
    background-color: #666;
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
    <body>
    <!-- Nội dung chính -->
    <div class="container">
        <h2 class="silver-text">Edit personal information</h2>
        <form action="{{ route('users.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" name="phone" id="phone" value="{{ $user->phone }}">
            </div>

            <div class="form-group">
                <label for="avatar">Avatar</label>
                <input type="file" name="avatar" id="avatar" accept="image/*">
                @if($user->avatar)
                    <div class="avatar-preview">
                        <p>Current avatar</p>
                        <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar">
                    </div>
                @endif
            </div>
            <hr style="margin: 30px 0; border: 1px solid #444;">
<h3 class="silver-text">Change Password</h3>

<div class="form-group">
    <label for="current_password">Current Password</label>
    <input type="password" name="current_password" id="current_password">
</div>

<div class="form-group">
    <label for="new_password">New Password</label>
    <input type="password" name="new_password" id="new_password">
</div>

<div class="form-group">
    <label for="new_password_confirmation">Confirm New Password</label>
    <input type="password" name="new_password_confirmation" id="new_password_confirmation">
</div>

            <div class="form-actions">
                <button type="submit">Save</button>
            </div>
        </form>
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
