<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
*/

// Trang chủ (chuyển hướng đến trang đăng nhập)
Route::get('/', function () {
    return redirect()->route('login.form');
});

// Hiển thị form đăng ký
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');

// Xử lý đăng ký
Route::post('register', [RegisterController::class, 'register'])->name('register');

// Hiển thị form đăng nhập
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login.form');

// Xử lý đăng nhập
Route::post('login', [LoginController::class, 'login'])->name('login.submit');

// Middleware cho admin (chỉ admin mới truy cập)
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    // Thông tin cá nhân của admin
    Route::match(['get', 'put'], '/profile', [AdminController::class, 'profile'])->name('admin.profile');
    
    // Dashboard admin
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::put('/profile', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
    
    // Quản lý vé
    Route::resource('bookings', BookingController::class);
    Route::get('/bookings/{id}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
    Route::put('/bookings/{id}', [BookingController::class, 'update'])->name('bookings.update');
    Route::post('/bookings/{id}/pay', [BookingController::class, 'pay'])->name('bookings.pay');
    
    // Quản lý danh mục sản phẩm
    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    
    // Quản lý bài viết
    Route::resource('post', PostController::class);

    // Các route quản lý sản phẩm
    Route::resource('product', ProductController::class)->except(['show']);
    Route::resource('product', ProductController::class);

    // Quản lý người dùng
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::resource('users', UserController::class);
});

// Middleware cho người dùng đã đăng nhập
Route::middleware(['auth'])->group(function () {
    // Thông tin profile của người dùng
    Route::match(['get', 'post'], '/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
});

// Trang chủ cho người dùng đã đăng nhập
Route::get('/home', [AdminController::class, 'index'])->name('home')->middleware('auth');

