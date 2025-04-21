<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Lấy thông tin cài đặt website và chia sẻ với tất cả các view
        $setting = Setting::first();
        View::share('setting', $setting);

        // Lấy ngôn ngữ từ session hoặc mặc định là 'vi'
        $locale = session('locale', 'vi');
        App::setLocale($locale);
    }
}
