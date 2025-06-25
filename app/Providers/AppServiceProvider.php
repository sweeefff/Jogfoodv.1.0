<?php

namespace App\Providers;

use Midtrans\Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Keranjang;

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
    public function boot(): void
    {
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        View::composer('*', function ($view) {
            $cartCount = 0;
            if (session('user_id')) {
                $cartCount = \App\Models\Keranjang::where('id_user', session('user_id'))->sum('jumlah');
            }
            $view->with('cartCount', $cartCount);
        });
    }
}
