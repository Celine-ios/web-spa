<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Product;
use App\BannerType;
use App\Banner;
use App\Pagos;
use Share;
use Mail;
use DB;
use App\DocumentCategory;
use App\Mail\SendMessage;

class HomeController extends Controller{
    public function index(){
        $special_count = Product::where('published', 1)
        ->where('product_special', 1)
        ->with(['discounts' => function ($query){
            $query->where('estado', 1)
            ->where('fecha_inicio', '<=', date('Y-m-d 00:00:00'))
            ->where('fecha_fin', '>=', date('Y-m-d 23:59:59'))
            ->where('codigo', null)
            ->where('tipo_cupon', 'normal')
            ->select('id','discount')
            ->orderBy('discount', 'desc')
            ->orderBy('created_at', 'desc');
        }, 'images'])->count();

        $special_count = ceil($special_count / 2);

        $product_special = Product::where('published', 1)
        ->where('product_special', 1)
        ->with(['discounts' => function ($query){
            $query->where('estado', 1)
            ->where('fecha_inicio', '<=', date('Y-m-d 00:00:00'))
            ->where('fecha_fin', '>=', date('Y-m-d 23:59:59'))
            ->where('codigo', null)
            ->where('tipo_cupon', 'normal')
            ->select('id','discount')
            ->orderBy('discount', 'desc')
            ->orderBy('created_at', 'desc');
        }, 'images'])->get();

        $product_special = $this->formato_productos($product_special);

        $product_offer = Product::where('published', 1)
        ->whereHas('discounts', function ($query){
            $query->where('estado', 1)
            ->where('fecha_inicio', '<=', date('Y-m-d 00:00:00'))
            ->where('fecha_fin', '>=', date('Y-m-d 23:59:59'))
            ->where('codigo', null)
            ->where('tipo_cupon', 'normal');
        })->with(['discounts' => function ($query){
            $query->where('estado', 1)
            ->where('fecha_inicio', '<=', date('Y-m-d 00:00:00'))
            ->where('fecha_fin', '>=', date('Y-m-d 23:59:59'))
            ->where('codigo', null)
            ->where('tipo_cupon', 'normal')
            ->select('id','discount')
            ->orderBy('discount', 'desc')
            ->orderBy('created_at', 'desc');
        }, 'images'])->get();

        $product_offer = $this->formato_productos($product_offer);

        $product_new = Product::where('published', 1)->with(['discounts' => function ($query){
            $query->where('estado', 1)
            ->where('fecha_inicio', '<=', date('Y-m-d 00:00:00'))
            ->where('fecha_fin', '>=', date('Y-m-d 23:59:59'))
            ->where('codigo', null)
            ->where('tipo_cupon', 'normal')
            ->select('id','discount')
            ->orderBy('discount', 'desc')
            ->orderBy('created_at', 'desc');
        }, 'images'])->orderBy('created_at', 'desc')->take(10)->get();

        $product_new = $this->formato_productos($product_new);

        $banners['principal']  = Banner::whereHas('banner_types', function ($q){
            $q->where('slug', 'principal');
        })->where('estado', 1)->inRandomOrder()->get();
        $banners['secundario'] = Banner::whereHas('banner_types', function ($q){
            $q->where('slug', 'secundario');
        })->where('estado', 1)->orderBy('created_at', 'DESC')->first();
        $banners['backGrupos'] = Banner::whereHas('banner_types', function ($q){
            $q->where('slug', 'backGrupos');
        })->where('estado', 1)->orderBy('created_at', 'DESC')->first();
        $banners['backCardio'] = Banner::whereHas('banner_types', function ($q){
            $q->where('slug', 'backCardio');
        })->where('estado', 1)->orderBy('created_at', 'DESC')->first();
        $banners['backFuerza'] = Banner::whereHas('banner_types', function ($q){
            $q->where('slug', 'backFuerza');
        })->where('estado', 1)->orderBy('created_at', 'DESC')->first();
        $banners['backTurco'] = Banner::whereHas('banner_types', function ($q){
            $q->where('slug', 'backTurco');
        })->where('estado', 1)->orderBy('created_at', 'DESC')->first();
        $banners['video']      = Banner::whereHas('banner_types', function ($q){
            $q->where('slug', 'video-principal');
        })->where('estado', 1)->orderBy('created_at', 'DESC')->first();
        $banners['terciario']  = Banner::whereHas('banner_types', function ($q){
            $q->where('slug', 'terciario');
        })->where('estado', 1)->orderBy('created_at', 'DESC')->take(2)->get();
        $banners['cardio']  = Banner::whereHas('banner_types', function ($q){
            $q->where('slug', 'cardio');
        })->where('estado', 1)->orderBy('created_at', 'DESC')->take(2)->get();
        $banners['grupos']  = Banner::whereHas('banner_types', function ($q){
            $q->where('slug', 'grupos');
        })->where('estado', 1)->orderBy('created_at', 'DESC')->take(2)->get();
        $banners['entrenador']  = Banner::whereHas('banner_types', function ($q){
            $q->where('slug', 'entrenador');
        })->where('estado', 1)->orderBy('created_at', 'DESC')->take(2)->get();
        $banners['musculacion']  = Banner::whereHas('banner_types', function ($q){
            $q->where('slug', 'musculacion');
        })->where('estado', 1)->orderBy('created_at', 'DESC')->take(2)->get();
        $banners['estiramiento']  = Banner::whereHas('banner_types', function ($q){
            $q->where('slug', 'estiramiento');
        })->where('estado', 1)->orderBy('created_at', 'DESC')->take(2)->get();
        $banners['humeda']  = Banner::whereHas('banner_types', function ($q){
            $q->where('slug', 'humeda');
        })->where('estado', 1)->orderBy('created_at', 'DESC')->take(2)->get();
        $banners['spinnig']  = Banner::whereHas('banner_types', function ($q){
            $q->where('slug', 'spinnig');
        })->where('estado', 1)->orderBy('created_at', 'DESC')->take(2)->get();
        $banners['parqueadero']  = Banner::whereHas('banner_types', function ($q){
            $q->where('slug', 'parqueadero');
        })->where('estado', 1)->orderBy('created_at', 'DESC')->take(2)->get();
        $banners['spa']  = Banner::whereHas('banner_types', function ($q){
            $q->where('slug', 'spa');
        })->where('estado', 1)->orderBy('created_at', 'DESC')->first();
        $banners['cursos']  = Banner::whereHas('banner_types', function ($q){
            $q->where('slug', 'cursos');
        })->where('estado', 1)->get();
        $banners['dietas']  = Banner::whereHas('banner_types', function ($q){
            $q->where('slug', 'dietas');
        })->where('estado', 1)->get();
        $secundario  = BannerType::where('slug','video-secundario')->first();
        // $banner->link_imagen

        return view('user.home', compact('product_special', 'product_offer', 'product_new', 'banners', 'special_count','secundario'));
    }

    public function empresa(){
        $docs = DocumentCategory::where('slug', '<>', 'lista-de-precios')->with(['docs' => function ($query){
            $query->orderBy('created_at', 'desc');
        }])->get();

        return view('user.profile.empresa', compact('docs'));
    }

    public function como_comprar(){
        return view('user.profile.como-comprar');
    }

    public function terminos(){
        return view('user.profile.terminos');
    }
    public function datos(){
        return view('user.profile.datos');
    }
    public function envios(){
        return view('user.profile.envios');
    }
    public function pagos(){
        return view('user.profile.pagos');
    }

    public function gracias(){
        return view('user.profile.gracias');
    }

    private function formato_productos($products){
        foreach ($products as $product) {
            $product->links = Share::load(url('product/'.$product->slug), $product->title.' en Tauret Computadores')->services();

            if(count($product->discounts) > 0) {
                $product->discount_percent = $product->discounts->first()->discount;
                $product->discount_price = round($product->price - ($product->price * ($product->discounts->first()->discount / 100)));
            }
            $product->image = $product->images->first()['link_imagen'];
        }

        return $products;
    }

    public function exitoso($plan){
      $miplan = $plan;
        return view('user.profile.exitoso', compact('miplan'));
    }

    public function addPay(Request $request){

      $user = Pagos::where('cc', $request->cc)->first();

      if ($user) {
        DB::table('state_pagos')->insert([
          'cc' => $request->cc,
          'plan' => $request->plan,
        ]);
        \Session::flash('message', 'Plan Renovado,'.$user->name.' gracias por preferirnos');
        return redirect('/');

      } else {
        Pagos::create($request->all());

        DB::table('state_pagos')->insert([
          'cc' => $request->cc,
          'plan' => $request->plan,
        ]);


        \Session::flash('message', 'Plan Creado,'.$request->name.' gracias por preferirnos');
        return redirect('/');

      }

    }



    public function rechazado(){
        return view('user.profile.rechazado');
    }
    public function pendiente(){
        return view('user.profile.pendiente');
    }

    public function contacto(){
        return view('user.profile.contacto');
    }

    public function contacto_producto($slug){
        $product = Product::where('slug', $slug)->first();

        if($product){
            $producto = $product->title;
            return view('user.profile.contacto', compact('producto'));
        } else{
            return redirect()->back();
        }
    }

    public function contacto_submit(Request $request){
        try {
            $validator = \Validator::make($request->all(), [
                'tipo-persona' => 'required|max:150',
                ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                if ($request->get('tipo-persona') == 'natural') {
                    $validator = \Validator::make($request->all(), [
                        'email'    => 'required|email',
                        'telefono' => 'required|numeric',
                        'ciudad'   => 'required|max:150',
                        'mensaje'  => 'required|max:1000',
                        ]);
                } elseif ($request->get('tipo-persona') == 'juridica') {
                    $validator = \Validator::make($request->all(), [
                        'razon'    => 'required|max:150',
                        'nit'      => 'required|max:150',
                        'email'    => 'required|email',
                        'telefono' => 'required|numeric',
                        'ciudad'   => 'required|max:150',
                        'mensaje'  => 'required|max:1000',
                        ]);
                }

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                } else {

                    $texto = $request->mensaje;

                    if ($request->get('tipo-persona') == 'natural') {
                        $mensaje = (object) [
                        'nombre' => $request->name,
                        'email' => $request->email,
                        'telefono' => $request->telefono,
                        'ciudad' => $request->ciudad,
                        'mensaje' => $request->mensaje,
                        ];
                    } elseif ($request->get('tipo-persona') == 'juridica') {
                        $mensaje = (object) [
                        'razon_social' => $request->razon,
                        'NIT' => $request->nit,
                        'nombre' => $request->name,
                        'email' => $request->email,
                        'telefono' => $request->telefono,
                        'mensaje' => $request->mensaje,
                        ];
                    }

                    $mail = Mail::to(env('MAIL_FROM'))->send(new SendMessage($mensaje));
                    \Session::flash('message', 'Mensaje enviado, gracias por preferirnos');
                    return redirect('/');
                }
            }
        } catch (\Exception $e) {
            \Session::flash('message-error', $e->getMessage());
        }
    }

    public function product_list(){
        $docs = DocumentCategory::where('slug', 'lista-de-precios')->with(['docs' => function ($query){
            $query->orderBy('created_at', 'desc');
        }])->first();

        if ($docs) {
            $docs = $docs->docs->first();
            $doc_update = getTheDate($docs->created_at);
            $doc = url('documents/'.$docs->link_documento);
        } else {
            $doc_update = getTheDate(date('Y-m-d'));
            $doc = "https://tauretcomputadores.com/pdf/1.pdf";
        }

        return view('user.products.lista-de-precios', compact('doc', 'doc_update'));
    }

    public function prueba(){
        $user = \App\User::find(3);
    }
}
