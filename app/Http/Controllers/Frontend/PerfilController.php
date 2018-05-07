<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use Auth;
use Cart;
use App\Product;
use App\ProductNotify;
use App\Wishlist;
use App\PcBuild;
use App\PcBuildProduct;
use App\User;
use Session;

class PerfilController extends Controller{
    public function __construct(){
        $this->middleware('user');
    }

    public function wishlist(){
        $wishlists  = Auth::guard('user')->user()->wishlists;
        $tags       = [];
        $filters    = [];
        $categories = [];

        Cart::instance('wishlist')->destroy();

        foreach ($wishlists as $wishlist) {
            $product = Product::find($wishlist->products_id);
            if ($product->published == 1) {
                $wishlist = Cart::instance('wishlist')->add($product->id, $product->title, 1, $product->price, ['tax' => ($product->tax ? $product->price * 0.19 : 0)])->associate('Product');
            } else {
                $wishlist = Wishlist::find($wishlist->id);
                $wishlist->delete();
            }

            $tags       = array_merge($tags, $product->tags->pluck('id')->toArray());
            $filters    = array_merge($tags, $product->filters->pluck('id')->toArray());
            $categories = array_merge($tags, $product->product_categories->pluck('id')->toArray());
        }

        $related = Product::where('published', 1)
        ->where(function($q) use ($tags, $filters, $categories) {
            $q->whereHas('tags' , function ($q2) use ($tags) {
                $q2->whereIn('id', $tags);
            })->orWhereHas('filters' , function ($q2) use ($filters) {
                $q2->whereIn('id', $filters);
            })->orWhereHas('product_categories' , function ($q3) use ($categories) {
                $q3->whereIn('id', $categories);
            });
        })
        ->take(5)
        ->inRandomOrder()
        ->get();

        foreach ($related as $product) {
            $product->links = \Share::load(url('product/'.$product->slug), $product->title.' en Tauret Computadores')->services();

            if(count($product->discounts) > 0) {
                $product->discount_price = round($product->price - ($product->price * ($product->discounts->first()->discount / 100)));
            }
            $product->image = $product->images->first()['link_imagen'];
        }

        return view('user.cart.wishlist', compact('wishlists', 'related'));
    }

    public function add_wishlist($slug){
        $product = Product::where('slug', $slug)->where('published', '1')->first();

        if ($product) {
            $product_wl = Wishlist::where('users_id', Auth::guard('user')->user()->id)->where('products_id', $product->id)->first();

            if (!$product_wl) {
                $wishlist = Cart::instance('wishlist')->add($product->id, $product->title, 1, $product->price, ['tax' => ($product->tax ? $product->price * 0.19 : 0)])->associate('Product');

                $wishlist_db = Wishlist::create([
                    'users_id' => Auth::guard('user')->user()->id,
                    'products_id' => $product->id
                    ]);

                if ($wishlist) {
                    return redirect()->back();
                }
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('/');
        }

    }

    public function remove_wishlist($id){
        $wishlist = Wishlist::where('users_id', Auth::guard('user')->user()->id)
        ->where('products_id', $id)
        ->first();

        if ($wishlist) {
            $wishlist->delete();
        }

        foreach (Cart::instance('wishlist')->content() as $value) {
            if ($value->id == $id) {
                Cart::instance('wishlist')->remove($value->rowId);
            }
        }

        return redirect()->back();
    }

    public function order(){
        $related = [];
        $orders = Auth::guard('user')->user()->orders;

        foreach ($orders as $order) {
            $total_amount = 0;
            foreach ($order->products as $product) {
                $amount = $product->unit_price * $product->units;
                $total_amount += round($amount);
            }

            $order->total_amount = $total_amount;
        }

        return view('user.profile.user-orders', compact('orders','related'));
    }

    public function userCustomPc(){
        $pc_builds  = PcBuild::where('users_id', Auth::guard('user')->user()->id)->where('activo', 1)->get();
        return view('user.profile.user-custom-pc', compact('pc_builds'));
    }

    public function view_build($id){
        $tags       = [];
        $filters    = [];
        $categories = [];
        $related    = [];

        try {
            $build = PcBuild::where('id', $id)->where('activo', 1)->first();
            if ($build) {
                Cart::instance('pc_build')->destroy();
                $pc_builds = $build->products;
                foreach ($pc_builds as $product) {
                    if ($product->published == 1) {
                        $build = Cart::instance('pc_build')->add($product->id, $product->title, 1, $product->price, ['tax' => ($product->tax ? $product->price * 0.19 : 0)])->associate('Product');
                        $product->tax = ($product->tax ? $product->price * 0.19 : 0);
                    } else {
                        $wishlist = PcBuildProduct::find($product->pivot->id);
                        $wishlist->delete();
                    }

                    $tags       = array_merge($tags, $product->tags->pluck('id')->toArray());
                    $filters    = array_merge($tags, $product->filters->pluck('id')->toArray());
                    $categories = array_merge($tags, $product->product_categories->pluck('id')->toArray());
                }

                $related = Product::where('published', 1)
                ->where(function($q) use ($tags, $filters, $categories) {
                    $q->whereHas('tags' , function ($q2) use ($tags) {
                        $q2->whereIn('id', $tags);
                    })->orWhereHas('filters' , function ($q2) use ($filters) {
                        $q2->whereIn('id', $filters);
                    })->orWhereHas('product_categories' , function ($q3) use ($categories) {
                        $q3->whereIn('id', $categories);
                    });
                })
                ->take(5)
                ->inRandomOrder()
                ->get();

                foreach ($related as $product) {
                    $product->links = \Share::load(url('product/'.$product->slug), $product->title.' en Tauret Computadores')->services();

                    if(count($product->discounts) > 0) {
                        $product->discount_price = ceil($product->price - ($product->price * ($product->discounts->first()->discount / 100)));
                    }
                    $product->image = $product->images->first()['link_imagen'];
                }

                $build_amount = Cart::instance('pc_build')->total();
                return view('user.profile.user-custom-detail', compact('pc_builds', 'build_amount', 'related', 'id'));

            } else {
                throw new \Exception("'No se encuentra la configuración'", 1);
            }
        } catch (\Exception $e) {
            Session::flash('message-error', $e->getMessage());
            return redirect('user-custom-pc');
        }
    }

    public function add_custom($action){
        $armados = Auth::guard('user')->user()->pc_builds->count();
        $build = PcBuild::create(['users_id' => Auth::guard('user')->user()->id, 'titulo' => 'Armado de PC #'.$armados]);
        $build_products = Cart::instance('pc_build')->content();

        foreach ($build_products as $product) {
            if($product->id == 'ARMADO'){
                $build->fill(['armado' => 1])->save();
            } else {
                $prod = Product::where('id', $product->id)->where('published', 1)->first();
                if ($prod) {
                    $b_prod = PcBuildProduct::create(['pc_build_id' => $build->id, 'product_id' => $prod->id, 'cantidad' => $product->qty]);
                }                
            }
        }

        if ($build->products->count() > 0) {
            if ($action == 'guardar') {
                Session::flash('message', 'Configuración Creada Exitosamente');
                return redirect('user-custom-pc');
            } elseif ($action == 'comprar') {
                Cart::instance('shopping')->destroy();
                foreach ($build_products as $product) {
                    Cart::instance('shopping')->add($product->id, $product->name, $product->qty, $product->price, ['tax' => $product->tax]);
                }
                Cart::instance('pc_build')->destroy();

                Session::flash('message', 'Configuración Creada Exitosamente');
                return redirect('view_cart');
            }
        }

    }

    public function remove_build($config, Request $request){
        try {            
            $id = $request->id;

            if ($id !== 'all') {
                $product = PcBuildProduct::where('pc_build_id', $config)->where('id', $id)->first();
                if ($product) {
                    $product->delete();

                    Session::flash('message', 'Producto Borrado de la Configuración');
                    return redirect()->back();
                } else {
                    throw new \Exception("Producto no Encontrado", 1);
                }
            } else {
                $build = PcBuild::find($config);
                if ($build) {
                    $build->activo = 0;
                    $build->save();

                    Session::flash('message', 'Configuración Borrada');
                    return redirect('user-custom-pc');

                } else {
                    throw new \Exception("Configuración no Encontrada", 1);
                }
                
            }
        } catch(\Exception $e) {
            Session::flash('message-error', $e->getMessage());
            return redirect()->back();
        }
    }

    public function build_cart($id){
        try {
            $build = PcBuild::where('id', $id)->where('activo', 1)->first();

            if ($build) {
                foreach ($build->products as $build) {
                    $product = Product::where('published', '1')->with(['discounts' => function ($query){
                        $query->where('estado', 1)
                        ->where('fecha_fin', '>', date('Y-m-d 00:00:00'))
                        ->where('codigo', null)
                        ->orderBy('discount', 'desc')
                        ->orderBy('created_at', 'desc');
                    }])->find($build->id);

                    if ($product) {
                        if(count($product->discounts) > 0) {
                            $product->discount_price = round($product->price - ($product->price * ($product->discounts->first()->discount / 100)));
                            $wishlist = Cart::instance('shopping')->add($product->id, $product->title, 1, $product->discount_price, ['tax' => ($product->tax ? $product->discount_price * 0.19 : 0)])->associate('Product');

                        } else {
                            $wishlist = Cart::instance('shopping')->add($product->id, $product->title, 1, $product->price, ['tax' => ($product->tax ? $product->price * 0.19 : 0)])->associate('Product');
                        }
                    }
                }

                Cart::instance('pc_build')->destroy();

                return redirect('view_cart');

            } else {
                throw new \Exception("No se encuentra una configuración adecuada", 400);
            }
        } catch (Exception $e) {
            Session::flash('message-error', $e->getMessage());
            return redirect('user-custom-pc');
        }
    }

    public function notify_product(Request $request){
        try {
            $product = Product::where('slug', $request->slug)->where('quantity', 0)->first();
            $user = \Auth::guard('user')->user();

            if ($product && $user) {
                $notify = ProductNotify::create(['product_id' => $product->id, 'user_id' => $user->id]);
                if ($notify) {
                    Session::flash('message', "Registro Guardado, cuando hayan existencias se notificará al usuario");
                    return redirect()->back();
                } else {
                    throw new \Exception("Error con la notificación", 400);
                }
            } else {
                throw new \Exception("El producto no se encuentra o ya tiene unidades para la venta", 400);
            } 
        } catch (\Exception $e) {
            Session::flash('message-error', $e->getMessage());
            return redirect()->back();
        }

        
    }

    public function perfil(){
        return view('user.profile.perfil');
    }

    public function perfil_update(Request $request){
        $user = User::find(\Auth::guard('user')->user()->id);
        $validator = \Validator::make($request->all(), [
            'first_name' => 'required|max:255',
            'last_name'  => 'required|max:255',
            'username'   => ['required', 'max:255', Rule::unique('users')->ignore($user->id)],
            'email'      => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'birthday'   => 'required|date|before:tomorrow',
            'city'       => 'required|max:255',
            ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            if ($request->has('old_password')) {
                $validator2 = \Validator::make($request->all(), [
                    'old_password'     => 'required|min:6',
                    'password' => 'required|min:6|different:old_password',
                    ]);

                if ($validator2->fails()) {
                    return redirect()->back()->withErrors($validator2)->withInput();
                } else {
                    $prueba = \Hash::check($request->password, $user->password);
                    if (!$prueba) {
                        return redirect()->back()->withErrors(['old_password' => 'La contraseña debe ser igual a la que usa para Iniciar Sesión'])->withInput();
                    }
                }
            } 

            $user->fill($request->all())->save();
            Session::flash('message', "Registro Guardadoo");
            return redirect()->back();
        }
    }

    public function upload_avatar(Request $request){
        $file = $request->file('avatar');
        $user = \Auth::guard('user')->user();

        $imageName = $this->cargar_imagen($file, (empty($user->avatar) ? $user->username : $user->avatar) );

        if ($imageName) {
            return \Response::json(['image' => url("images/users/".$imageName)], 200);
        } else{
            return \Response::json(['error' => 'La imagen no pudo ser subida'], 400);
        }
    }

    private function cargar_imagen($file, $imageName = false){
        if ($imageName) {
            $exists = \File::exists(public_path("images/users/".$imageName));
            if ($exists) {
                \File::delete(public_path("images/users/".$imageName));
            }

            $image = explode('.', $imageName);
            $imageName = $image[0].'.'.$file->getClientOriginalExtension();
        } else {
            $imageName = 'Banner_'.date('YmdHis', time()).rand().'.'.$file->getClientOriginalExtension();
        }

        $file->move(public_path('images/users'), $imageName);

        $exists = \File::exists(public_path("images/users/".$imageName));

        if ($exists) {
            return $imageName;
        } else {
            return false;
        }
    }

}
