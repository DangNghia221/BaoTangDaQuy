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
use App\Http\Controllers\SettingController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\User\NewsController;
use App\Http\Controllers\User\TicketController;
use App\Http\Controllers\User\ProfileController;

use App\Http\Controllers\User\InvoiceController;
use App\Http\Controllers\LibraryController; 
use App\Http\Controllers\ProductBookingController;
use App\Http\Controllers\ProductHistoryController;
use App\Http\Controllers\ArtifactController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShopCategoryController;
use App\Http\Controllers\User\CategoryShopController;

Route::get('/shop', [CategoryShopController::class, 'index'])->name('categoryshop.index');
Route::get('/categoryshop/{category}', [CategoryShopController::class, 'showDetail'])->name('categoryshop.detail');
Route::get('/shop/{shop}', [ShopController::class, 'show'])->name('shop.show');
Route::get('/shopcategory/{shopcategory}/showshop', [ShopCategoryController::class, 'showshop'])->name('shopcategory.showshop');
Route::get('/categoryshop/detail/{id}', [ShopController::class, 'detail'])->name('shop.detail');




Route::prefix('admin')->middleware(['auth'])->group(function () {
    // Route CRUD sản phẩm
    Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
    Route::get('/shop/create', [ShopController::class, 'create'])->name('shop.create');
    Route::post('/shop', [ShopController::class, 'store'])->name('shop.store');
    Route::get('/shop/{shop}/edit', [ShopController::class, 'edit'])->name('shop.edit');
    Route::put('/shop/{shop}', [ShopController::class, 'update'])->name('shop.update');
    Route::delete('/shop/{shop}', [ShopController::class, 'destroy'])->name('shop.destroy');
    Route::post('/shop/{id}/restore', [ShopController::class, 'restore'])->name('shop.restore');
    Route::get('/shop/trashed', [ShopController::class, 'trashed'])->name('shop.trashed');

});
Route::prefix('admin')->middleware(['auth'])->group(function () {
    // Route CRUD danh mục sản phẩm (ShopCategory)
    Route::get('/shopcategory', [ShopCategoryController::class, 'index'])->name('shopcategory.index');
    Route::get('/shopcategory/create', [ShopCategoryController::class, 'create'])->name('shopcategory.create');
    Route::post('/shopcategory', [ShopCategoryController::class, 'store'])->name('shopcategory.store');
    Route::get('/shopcategory/{shopcategory}/edit', [ShopCategoryController::class, 'edit'])->name('shopcategory.edit');
    Route::put('/shopcategory/{shopcategory}', [ShopCategoryController::class, 'update'])->name('shopcategory.update');
    Route::delete('/shopcategory/{shopcategory}', [ShopCategoryController::class, 'destroy'])->name('shopcategory.destroy');
});



// Quản lý hiện vật trong admin
Route::prefix('admin')->middleware(['auth'])->group(function () {
    // Route CRUD hiện vật
    Route::get('/artifacts', [ArtifactController::class, 'index'])->name('artifacts.index');
    Route::get('/artifacts/create', [ArtifactController::class, 'create'])->name('artifacts.create');
    Route::post('/artifacts', [ArtifactController::class, 'store'])->name('artifacts.store');
    Route::get('/artifacts/{artifact}/edit', [ArtifactController::class, 'edit'])->name('artifacts.edit');
    Route::put('/artifacts/{artifact}', [ArtifactController::class, 'update'])->name('artifacts.update');
    Route::delete('/artifacts/{artifact}', [ArtifactController::class, 'destroy'])->name('artifacts.destroy');
    Route::get('artifacts/trashed', [ArtifactController::class, 'trashed'])->name('artifacts.trashed');
    Route::post('artifacts/{id}/restore', [ArtifactController::class, 'restore'])->name('artifacts.restore');
    Route::delete('artifacts/{id}/force-delete', [ArtifactController::class, 'forceDelete'])->name('artifacts.forceDelete');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/history/store/{id}', [ProductHistoryController::class, 'store'])->name('history.store');
    Route::get('/history', [ProductHistoryController::class, 'showHistory'])->name('history.index');
});

Route::get('/booking', [ProductBookingController::class, 'index'])->name('book.index');



Route::prefix('admin')->group(function () {
    Route::resource('libary', \App\Http\Controllers\LibaryController::class)->only(['index', 'store', 'destroy']);
});



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
    return redirect()->route('home');
});


// Đăng ký
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('register', [RegisterController::class, 'register'])->name('register');

// Đăng nhập
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.submit');

// Trang chủ sau khi đăng nhậpp
Route::get('/', function () {
    return redirect()->route('home');
});
Route::get('/home', [AdminController::class, 'index'])->name('home');

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
    Route::get('products/{id}/restore', [ProductController::class, 'restore'])->name('product.restore');
    Route::get('/products/trashed', [ProductController::class, 'trashed'])->name('product.trashed');
    Route::delete('/product/{id}/deleteForever', [ProductController::class, 'deleteForever'])->name('product.deleteForever');


    // Quản lý người dùng
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::resource('users', UserController::class);
    // Quản lý thông tin web
    Route::get('settings', [SettingController::class, 'index'])->name('admin.settings.index');
    Route::put('settings', [SettingController::class, 'update'])->name('admin.settings.update');
    
    
});
