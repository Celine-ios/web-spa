<?php

namespace App\Providers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot(){
        View::composer('*', function ($view) {
            /** @var \Illuminate\Contracts\View\View $view */
            $view->with('cart_list', Cart::instance('shopping')->content());
            $view->with('wish_list', Cart::instance('wishlist')->content());
            $view->with('cart_price', Cart::instance('shopping')->total());
        });
    }
}
