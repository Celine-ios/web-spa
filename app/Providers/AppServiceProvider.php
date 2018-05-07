<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;

use App\Product;
use App\ProductCategory;
use App\ProductBrand;
use App\Wallpaper;
use App\Banner;
use App\Wishlist;
use App\Order;
use App\PcBuild;
use App\User;
use Cart;

use App\Observers\ProductObserver;


class AppServiceProvider extends ServiceProvider{
    public function boot(Request $request){
        Product::observe(ProductObserver::class);
        User::observe(UserObserver::class);

        view()->composer('user.*', function($view) use ($request){
            $control = class_basename($request->route()->getAction()['controller']);
            list($controller, $action) = explode('@', $control);

            if ($controller == 'ProductController' && $action == 'product') {
                $slug = $request->route()->getParameter('slug');
                $brand = ProductBrand::whereHas('products', function($q) use($slug) {
                    $q->where('slug', $slug);
                })->pluck('slug')->first();

                $currentPath = "products/brand?brand=".$brand;
            } else {
                $currentPath = $request->path(). ($request->getQueryString() ? '?'.$request->getQueryString() : '');
            }

            $wallpaper   = Wallpaper::where('link', $currentPath)->first();

            $prod_cat    = [];
            $categories  = ProductCategory::where('estado', 1)->where('hidden','!=',1)->orderBy('nombre','asc')->get();
            foreach ($categories as $category) {
                $category->brands = ProductBrand::whereHas('products', function ($q1) use ($category){
                    $q1->whereHas('product_categories', function($q2) use ($category){
                        $q2->whereHas('categories', function($q3) use ($category){
                            $q3->where('id', $category->id);
                        });
                    });
                })->pluck('nombre', 'slug');
                $product = Product::whereHas('product_categories', function ($q1) use ($category){
                    $q1->whereHas('categories', function($q2) use ($category){
                        $q2->where('id', $category->id);
                    });
                })->where('published', 1)->inRandomOrder()->first();
                if ($product) {
                    $product->price = round($product->price);

                    if(count($product->discounts) > 0) {
                        $product->discount_price = round($product->price - ($product->price * ($product->discounts->first()->discount / 100)));
                        $product->discount_percent = $product->discounts->first()->discount;
                    }
                    $product->image = $product->images->first()['link_imagen'];
                }

                $prod_cat[$category->id] = $product;

            }

            $view->with('categories', $categories);
            $view->with('prod_cat', $prod_cat);
            $view->with('wpaper', $wallpaper);
        });

        view()->composer('user.includes.banner-impulso', function($view) use ($request){
            $banners = Banner::whereHas('banner_types', function($query){
                $query->where('slug', 'cuaternario');
            })->orderBy('created_at', 'desc')->get();

            $view->with('banners_impulso', $banners);
        });


        view()->composer('user.includes.login', function($view) use ($request){
            if(\Auth::guard('user')->user()){
                $wishlist = Wishlist::where('users_id', \Auth::guard('user')->user()->id)->count();
                $order    = Order::where('users_id', \Auth::guard('user')->user()->id)->count();
                $custom   = PcBuild::where('users_id', \Auth::guard('user')->user()->id)->count();
            } else {
                $wishlist = 0;
                $order    = 0;
                $custom   = 0;
            }
            // $wishlist = Wishlist::all();

            $view->with('wl_count', $wishlist);
            $view->with('order_count', $order);
            $view->with('custom_count', $custom);

        });
    }

    /**
    * Register any application services.
    *
    * @return void
    */
    public function register()
    {
        //
    }
}
