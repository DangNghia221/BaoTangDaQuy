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


Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');

Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::get('/', function () {
    return view('welcome');
});




Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('users', UserController::class);
});

Route::get('/home',[AdminController::class,'index'])->name('home');