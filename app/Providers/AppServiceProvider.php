<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\CartController;

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
    public function boot(CartController $cartController)
    {
        View::composer('*', function ($view) use ($cartController) {
            $cartItemCount = $cartController->getCartItemCount();
            $view->with('cartItemCount', $cartItemCount);
        });
    }
}