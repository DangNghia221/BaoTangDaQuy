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
use App\Http\Controllers\User\TicketController;
use App\Http\Controllers\User\ProfileController;

use App\Http\Controllers\User\InvoiceController;

Route::get('/users/trashed', [UserController::class, 'trashed'])->name('users.trashed');
// Khôi phục user đã xóa
Route::put('/users/restore/{id}', [UserController::class, 'restore'])->name('users.restore');

// Xóa vĩnh viễn user
Route::delete('/users/force-delete/{id}', [UserController::class, 'forceDelete'])->name('users.forceDelete');


Route::middleware('auth')->group(function () {
    Route::get('/user/invoices', [App\Http\Controllers\User\InvoiceController::class, 'index'])
        ->name('user.invoices.index');
});


Route::middleware(['auth'])->group(function () {
    // Thông tin cá nhân người dùng (UserController)
    Route::get('/user-info', [ProfileController::class, 'profile'])->name('users.profile');
    Route::get('/user-info/edit', [ProfileController::class, 'edit'])->name('users.profile.edit');
    Route::put('/user-info/update', [ProfileController::class, 'update'])->name('users.profile.update');

});



Route::post('/tickets/order/{id}', [TicketController::class, 'order'])->name('ticket.order');

Route::get('/ticker/detail/{id}', [TicketController::class, 'show'])->name('ticket.detail');




Route::get('/ve-tham-quan', [TicketController::class, 'index'])->name('ticket.index');

Route::get('/bai-viet/{id}', [NewsController::class, 'show'])->name('posts.show');

Route::get('/bai-viet', [NewsController::class, 'index'])->name('news.index');





// Trang chủ chuyển hướng đến đăng nhập
Route::get('/', function () {
    return redirect()->route('login');
});

// Đăng ký
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('register', [RegisterController::class, 'register'])->name('register');

// Đăng nhập
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.submit');

// Trang chủ sau khi đăng nhập
Route::get('/home', [AdminController::class, 'index'])
    ->name('home')
    ->middleware(['auth', 'admin']); // <-- thêm admin middleware


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
