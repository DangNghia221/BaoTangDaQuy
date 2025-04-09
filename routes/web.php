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
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\User\NewsController;

Route::get('/bai-viet/{id}', [NewsController::class, 'show'])->name('posts.show');

Route::get('/bai-viet', [NewsController::class, 'index'])->name('news.index');





// Trang chủ chuyển hướng đến đăng nhập
Route::get('/', function () {
    return redirect()->route('login.form');
});

// Đăng ký
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('register', [RegisterController::class, 'register'])->name('register');

// Đăng nhập
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('login', [LoginController::class, 'login'])->name('login.submit');

// Trang chủ sau khi đăng nhập
Route::get('/home', [AdminController::class, 'index'])->name('home')->middleware('auth');

// ====== NGƯỜI DÙNG ĐÃ ĐĂNG NHẬP ======

Route::middleware(['auth'])->group(function () {
    // Thông tin cá nhân
    Route::match(['get', 'post'], '/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
});

// ====== QUẢN TRỊ VIÊN (ADMIN) ======

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    // Dashboard
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Thông tin cá nhân
    Route::match(['get', 'put'], '/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::put('/profile', [AdminController::class, 'updateProfile'])->name('admin.profile.update');

    // Quản lý vé
    Route::resource('bookings', BookingController::class);
    Route::get('/bookings/{id}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
    Route::put('/bookings/{id}', [BookingController::class, 'update'])->name('bookings.update');
    Route::post('/bookings/{id}/pay', [BookingController::class, 'pay'])->name('bookings.pay');

    // Quản lý danh mục sản phẩm (có prefix admin)
    Route::resource('categories', CategoryController::class, ['as' => 'admin']);

    // Quản lý bài viết
    Route::resource('post', PostController::class);

    // Quản lý sản phẩm
    Route::resource('product', ProductController::class);

    // Quản lý người dùng
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::resource('users', UserController::class);
});
