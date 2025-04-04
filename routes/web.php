<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\BookingController;




// Middleware cho admin
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::match(['get', 'put'], '/profile', [AdminController::class, 'profile'])->name('admin.profile');
    // Dashboard
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::put('/admin/profile', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
    

    //Vé
    Route::resource('bookings', BookingController::class);
    Route::get('/bookings/{id}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
Route::put('/bookings/{id}', [BookingController::class, 'update'])->name('bookings.update');
Route::post('/bookings/{id}/pay', [BookingController::class, 'pay'])->name('bookings.pay');

    // Quản lý danh mục 
    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');

    // Quản lý bài viết
    Route::resource('post', PostController::class);
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');

    // Quản lý sản phẩm (trừ show)
    Route::resource('product', ProductController::class)->except(['show']);
    Route::resource('product', ProductController::class);
    // Quản lý người dùng
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::resource('users', UserController::class);
});

// Middleware cho user đã đăng nhập
Route::middleware(['auth'])->group(function () {
    Route::match(['get', 'post'], '/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
});

// Trang chủ
Route::get('/', function () {
    return view('welcome');
});

// Trang home
Route::get('/home', [AdminController::class, 'index'])->name('home')->middleware('auth');
