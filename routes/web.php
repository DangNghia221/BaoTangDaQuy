<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;

use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

Route::prefix('admin')->group(function () {
    Route::resource('categories', CategoryController::class);
});

Route::get('/admin/categories', function () {
    return view('admin.categories.index');
});

Route::prefix('admin/post')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('post.index');
    Route::get('/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/store', [PostController::class, 'store'])->name('post.store');
    Route::post('/upload-image', [PostController::class, 'uploadImage'])->name('post.upload');
    Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
        Route::resource('post', PostController::class);
    });
    
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    // Route cho tất cả các hành động resource, bao gồm cả 'create'
    Route::resource('post', PostController::class);
});

Route::prefix('admin')->group(function () {
    Route::resource('product', ProductController::class)->except(['show']);
});



Route::middleware(['auth'])->group(function () {
  Route::match(['get', 'post'], '/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');

});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
   

});


Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});




Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::resource('users', UserController::class);
});


Route::get('/home',[AdminController::class,'index'])->name('home')->middleware('auth');
