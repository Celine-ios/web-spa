<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Product;
use App\User;
use App\Order;
use App\ShippingOrder;
use App\OnlineOrder;
use App\OrderProduct;
use App\ProductCategory;
use App\ProductSubcategory;
use App\Mail\SendEmail;
use App\Mail\SendRejectedMail;
use App\PcBuild;
use App\PcBuildProduct;
use Auth;
use Cart;
use Session;
use Mail;


class CartController extends Controller{
    public function add_cart($slug, Request $request){
        $product = Product::where('slug', $slug)->where('published', '1')->with(['discounts' => function ($query){
            $query->where('estado', 1)
            ->where('fecha_fin', '>', date('Y-m-d 00:00:00'))
            ->where('codigo', null)
            ->orderBy('discount', 'desc')
            ->orderBy('created_at', 'desc');
        }])->first();

        if ($product) {
            if(count($product->discounts) > 0) {
                $product->discount_price = round($product->price - ($product->price * ($product->discounts->first()->discount / 100)));
                $wishlist = Cart::instance('shopping')->add($product->id, $product->title, $request->input('qty'), $product->discount_price, ['tax' => ($product->tax ? $product->discount_price * 0.19 : 0)])->associate('Product');

            } else {
                $wishlist = Cart::instance('shopping')->add($product->id, $product->title, $request->input('qty'), $product->price, ['tax' => ($product->tax ? $product->price * 0.19 : 0)])->associate('Product');
            }

            if ($wishlist) {
                toast('Producto Agregado al Carrito', $product->title);
                return redirect()->back();
            }
        } else {
            return redirect('/');
        }
    }

    public function remove_cart($rowId){
        try {
            $cart = Cart::instance('shopping')->get($rowId);

            if ($cart) {
                $product_name = $cart->name;
                $wishlist = Cart::instance('shopping')->remove($rowId);
                toast($product_name, 'Producto Eliminado del Carrito');
                return redirect()->back();
            }

        } catch (\Exception $e) {
            toast()->error($e->getMessage(), 'Error');
            return redirect()->back();
        }
    }

    public function view_cart(){
        $tax_all = 0;
        $cart = Cart::instance('shopping')->content();
        $metodosPago = [null => 'Selecciona un Método de Pago', 'contraentrega' => 'Contraentrega','tarjeta_credito'=>'Tarjeta de Crédito','pse'=>'PSE/Tarjeta Debito','efecty'=>'Efecty'];

        foreach ($cart as $prod) {
            $tax_all = $tax_all + $prod->options->tax;
        }

        // $pagos = MP::get('/v1/payment_methods');
        // if ($pagos['status'] == 200) {
        //     foreach ($pagos['response'] as $pago)
        //     {
        //         if($pago['id']!="davivienda")
        //         $payment_methods[$pago['id']] = $pago['name'];
        //     }
        // }
        $mp = new \MP ("TEST-4590693279542996-053011-58ca65c6986c101c29eff0bc2014798a__LC_LB__-194916167");//Access token

        $payment_methods = $mp->get ("/v1/payment_methods");
        return view('user.cart.cart', compact('tax_all', 'payment_methods','metodosPago'));
    }

    public function payment_methods($method)
    {
        if ($method == 'contraentrega')
        {
            $metodo = array(
                "id" => "contraentrega",
                "name" => "Contraentrega",
                "payment_type_id" => "ticket",
                "status" => "active",
                "secure_thumbnail" => url('images/icono.png'),
                "thumbnail" => url('images/icono.png'),
                "deferred_capture" => "does_not_apply",
                "settings" => [],
                "additional_info_needed" => [],
                "min_allowed_amount" => 1600,
                "max_allowed_amount" => 150000000,
                "accreditation_time" => 10080,
                "financial_institutions" => []
                );
        }
        else
        {
            $pagos = MP::get('/v1/payment_methods');
            if ($pagos['status'] == 200) {
                foreach ($pagos['response'] as $pago) {
                    if ($pago['id'] == $method) {
                        $metodo = $pago;
                    }
                }
            }
        }

        return $metodo;
    }

    public function pay_cart(Request $request)
    {
        // dd($request->all());
        try
        {
            $validator = \Validator::make($request->all(), [
                'dni'          => 'required|numeric',
                'nombres'      => 'required|max:150',
                'apellidos'    => 'required|max:150',
                'email'        => 'required|email',
                'direccion'    => 'required|max:200',
                'direccion_2'  => 'max:200',
                'ciudad'       => 'required|max:150',
                'telefono'     => 'required|numeric',
                'telefono_2'   => 'numeric',
                'fax'          => 'numeric',
                'payment_type' => 'required',
                'terms'        => 'required'
                ]);

            if ($validator->fails())
            {
                Session::flash('message-error', 'Debes llenar en su totalidad el formulario');
                return redirect('view_cart')->withErrors($validator)->withInput();
            }

            else
            {
                if ($request->payment_type == 'contraentrega')
                {
                    if (!in_array($request->ciudad, ['Bogotá','Bogota']))
                    {
                        throw new \Exception('El servicio de pago contraentrega actualmente no se encuentra disponible en tu ciudad', 400);
                    }
                }

                if (isset($response->error))
                {
                    throw new \Exception($response->error, $response->status);
                }
                else
                {
                    if (!Auth::guard('user')->user())
                    {
                        $user = User::find(1);
                    }
                    else
                    {
                        $user = Auth::guard('user')->user();
                    }

                    $cart = Cart::instance('shopping')->content();
                    $orden = Order::create([
                        'users_id'  => $user->id,
                        'estado'    => 'pendiente',
                        'tipo_pago' => $request->input('payment_type')
                        ]);

                    $request->merge(['orders_id' => $orden->id]);
                    $envio = ShippingOrder::create($request->all());
                    $items = [];

                    foreach ($cart as $product)
                    {
                        $prod = Product::find($product->id);
                        $pcat = 0;
                        foreach ($prod->product_categories as $key => $value)
                        {
                            $pcat = ($key == 0 ? $value->id : $pcat);
                        }

                        $order_product = OrderProduct::create([
                            'order_id'   => $orden->id,
                            'product_id' => $product->id,
                            'units'      => $product->qty,
                            'unit_price' => $product->price
                            ]);

                        $items[] = [
                        'id'          => $product->id,
                        'category_id' => 'computing',
                        'title'       => $product->name,
                        'description' => $prod->subtitle,
                        'picture_url' => $request->root().'/images/products/'.$prod->images->first()['link_imagen'],
                        'quantity'    => (int) $product->qty,
                        'currency_id' => 'COP',
                        'unit_price'  => (int) $product->price
                        ];
                    }

                    if ($request->input('payment_type') == 'tarjeta_credito')
                    {
                        //WORK HERE

                        $lastOrder = ShippingOrder::all()->last();

                        $mp = new \MP("TEST-4590693279542996-053011-58ca65c6986c101c29eff0bc2014798a__LC_LB__-194916167");//Access token de la cuenta de mercado pago

                        $payment_data = array(
                            "transaction_amount" => intval($request->amount),
                            "token" => $request->token,
                            "description" => "Pago Tauret ".$orden->id,
                            "installments" =>intval($request->installments),
                            "payment_method_id" => $request->paymentMethodId,
                            "payer" => array (
                                "email" => $request->email
                            )
                        );

                        try
                        {
                            $payment = $mp->post("/v1/payments", $payment_data);
                            $url = $payment['response']['transaction_details']['external_resource_url'];

                            return redirect($url);
                        }
                        catch(\MercadoPagoException $e)
                        {
                            $error = $e->retornarError();
                            \Session::flash('error', $error);
                            return redirect('view_cart');
                        }

                        // else
                        // {
                        //     Session::flash('message-error', 'Error en el servicio');
                        //     return redirect('view_cart')->withInput();
                        // }
                    }
                    if ($request->input('payment_type') == 'pse')
                    {
                        $payment_data = array(
                            "transaction_amount" => intval($request->amount),
                            "description" => "Pago Tauret ".$orden->id,
                            "payer" => array (
                                "email" => $request->email,
                                "identification" => array(
                                    "type" => "CC",
                                    "number" => $request->dni,
                                ),
                                "entity_type"=>"individual"
                            ),
                            "payment_method_id" => "pse",
                            "transaction_details" => array(
                                "financial_institution" => intval($request->banco)
                            ),
                            "additional_info" => array(
                                "ip_address" => "127.0.0.1"
                            ),
                            "callback_url" => "http://www.your-site.com"
                        );
                        try
                        {
                         $mp = new \MP("TEST-4590693279542996-053011-58ca65c6986c101c29eff0bc2014798a__LC_LB__-194916167");//Access token de la cuenta de mercado pago

                            $payment = $mp->post("/v1/payments", $payment_data);
                            $url = $payment['response']['transaction_details']['external_resource_url'];

                            return redirect($url);
                        }
                        catch(\MercadoPagoException $e)
                        {
                            $error = $e->retornarError();
                            \Session::flash('error', $error);
                            return redirect('view_cart');
                        }
                    }
                    if($request->input('payment_type') =="efecty"  || $request->input('payment_type') =="davivienda")
                    {
                        $payment_data = array(
                            "transaction_amount" => intval($request->amount),
                            "description" => "Pago Tauret ".$orden->id,
                            "payment_method_id" => $request->input('payment_type'),
                            "payer" => array (
                                "email" => $request->email,
                                "first_name"=> $request->nombres,
                                "last_name"=> $request->apellidos,

                            )
                        );
                        try
                        {
                            $mp = new \MP("TEST-4590693279542996-053011-58ca65c6986c101c29eff0bc2014798a__LC_LB__-194916167");//Access token de la cuenta de mercado pago

                            $payment = $mp->post("/v1/payments", $payment_data);
                            $url = $payment['response']['transaction_details']['external_resource_url'];

                            return redirect($url);
                        }
                        catch(\MercadoPagoException $e)
                        {
                            $error = $e->retornarError();
                            \Session::flash('error', $error);
                            return redirect('view_cart');
                        }
                    }
                    else
                    {
                        Mail::to($orden->shipping_order->email)
                        ->bcc(env('MAIL_FROM'), '')
                        ->send(new SendEmail($orden, Cart::instance('shopping')->total()));

                        $cart = Cart::instance('shopping')->destroy();

                        Session::flash('message', 'Su pedido fue procesado con la orden #'.str_pad($orden->id, 6, "0", STR_PAD_LEFT));
                        return redirect('view_cart');

                    }
                }
            }
        }
        catch(\Exception $e)
        {
            dd($e);
            // Session::flash('message-error', $e->getMessage());
            // return redirect('view_cart')->withInput();
        }
    }

    public function payment_notifications(Request $request){
        $topic = $request->topic;
        $id    = $request->id;

        if ($topic === 'payment') {
            $payment_info        = MP::get("/collections/notifications/" . $id);
            $merchant_order_info = MP::get("/merchant_orders/" . $payment_info["response"]["collection"]["merchant_order_id"]);
        } else {
            echo "Error obtaining the merchant_order";
            die();
        }

        if ($merchant_order_info["status"] == 200) {
            $paid_amount = 0;
            $pago        = null;

            foreach ($merchant_order_info["response"]["payments"] as $key => $payment) {
                $pago = $payment;
            }

            $online_order = OnlineOrder::where('collection_id', $id)->first();

            if ($online_order) {
                if ($pago['status'] !== 'in_process') {
                    $online_order->fill([
                        'collection_status' => $pago['status']
                        ])->save();

                    $order = Order::find($online_order->orders_id);
                    if ($order) {
                        if ($pago['status'] == 'approved') {
                            $order->fill(['estado' => 'aprobado'])->save();
                            $text = 'Su pedido #'.str_pad($order->id, 6, "0", STR_PAD_LEFT).' ha sido aprobado correctamente';
                            $user = $order->shipping_order;

                            Mail::to($user->email)
                            ->bcc(env('MAIL_FROM'), '')
                            ->send(new SendEmail($order, $pago['total_paid_amount']));
                        } elseif (in_array($pago['status'], ['rejected', null])) {
                            $order->fill(['estado' => 'rechazado'])->save();
                            Mail::to($order->shipping_order->email)
                            ->bcc(env('MAIL_FROM'), '')
                            ->send(new SendRejectedMail($order));
                        }
                    }
                }
            }

            print_r($merchant_order_info["response"]["payments"]);
            print_r($merchant_order_info["response"]["shipments"]);
        }
    }

    public function cart_callback(Request $request, $orders_id){
        $order = Order::find($orders_id);

        if ($order) {
            $request->merge(['orders_id' => $order->id]);

            $online_order = OnlineOrder::where('orders_id', $order->id)->first();

            if (!$online_order) {
                $online_order = OnlineOrder::create($request->all());
            }

            if ($request->collection_status == 'approved') {
                $order->fill(['estado' => 'aprobado'])->save();
                $cart = Cart::instance('shopping')->destroy();
                Mail::to($order->shipping_order->email)
                ->bcc(env('MAIL_FROM'), '')
                ->send(new SendEmail($order, Cart::instance('shopping')->total()));

                return view('user.profile.gracias', compact('order'));
            } elseif (in_array($request->collection_status, ['rejected', null])) {
                $order->fill(['estado' => 'rechazado'])->save();
                $cart = Cart::instance('shopping')->destroy();
                Mail::to($order->shipping_order->email)
                ->bcc(env('MAIL_FROM'), '')
                ->send(new SendRejectedMail($order));

                return view('user.profile.rejected', compact('order'));
            } else {
                $cart = Cart::instance('shopping')->destroy();
                return view('user.profile.gracias', compact('order'));
            }

        } else {
            return redirect('/');
        }
    }

    public function build_result(Request $request){
        Cart::instance('pc_build')->destroy();

        if ($request->has('products')) {
            $productos = $request->products;
            foreach ($productos as $key => $value) {
                if (is_json($value)) {
                    $value = json_decode($value);
                    if (isset($value->nf_price)) {
                        if (strpos($key, 'ram') !== false) {
                            $id = Cart::instance('pc_build')->search(function ($cartItem, $rowId) use ($value) {
                                return $cartItem->id === $value->id;
                            });

                            if (count($id) > 0) {
                                foreach ($id as $item) {
                                    Cart::instance('pc_build')->update($item->rowId, ['qty' => ($item->qty + 1)]);
                                }
                            } else {
                                $wishlist = Cart::instance('pc_build')->add($value->id, $value->name, $value->qty, $value->nf_price, ['tax' => $value->tax]);
                            }
                        } elseif (strpos($key, 'accesorio') !== false) {
                            $id = Cart::instance('pc_build')->search(function ($cartItem, $rowId) use ($value) {
                                return $cartItem->id === $value->id;
                            });

                            if (count($id) > 0) {
                                foreach ($id as $item) {
                                    Cart::instance('pc_build')->update($item->rowId, ['qty' => ($item->qty + 1)]);
                                }
                            } else {
                                $wishlist = Cart::instance('pc_build')->add($value->id, $value->name, $value->qty, $value->nf_price, ['tax' => $value->tax]);
                            }
                        } elseif (strpos($key, 'hdd') !== false) {
                            $id = Cart::instance('pc_build')->search(function ($cartItem, $rowId) use ($value) {
                                return $cartItem->id === $value->id;
                            });

                            if (count($id) > 0) {
                                foreach ($id as $item) {
                                    Cart::instance('pc_build')->update($item->rowId, ['qty' => ($item->qty + 1)]);
                                }
                            } else {
                                $wishlist = Cart::instance('pc_build')->add($value->id, $value->name, $value->qty, $value->nf_price, ['tax' => $value->tax]);
                            }
                        } elseif (strpos($key, 'ssd') !== false) {
                            $id = Cart::instance('pc_build')->search(function ($cartItem, $rowId) use ($value) {
                                return $cartItem->id === $value->id;
                            });

                            if (count($id) > 0) {
                                foreach ($id as $item) {
                                    Cart::instance('pc_build')->update($item->rowId, ['qty' => ($item->qty + 1)]);
                                }
                            } else {
                                $wishlist = Cart::instance('pc_build')->add($value->id, $value->name, $value->qty, $value->nf_price, ['tax' => $value->tax]);
                            }
                        } else {
                            $wishlist = Cart::instance('pc_build')->add($value->id, $value->name, $value->qty, $value->nf_price, ['tax' => $value->tax]);
                        }
                    }
                } elseif (strpos($key, 'armado') !== false) {
                    if ($value == 'SI') {
                        $wishlist = Cart::instance('pc_build')->add('ARMADO', 'Servicio de Armado', 1, 0, ['tax' => 0]);
                    }
                }
            }
        }

        $build_products = Cart::instance('pc_build')->content();
        $build_amount = Cart::instance('pc_build')->total();
        $tax_build = 0;

        foreach ($build_products as $key => $value) {
            $tax_build = $tax_build + $value->options->tax;
        }


        return view('user.products.build-result', compact('build_products', 'build_amount', 'tax_build'));
    }

    public function print_cart($action)
    {

        $build_products = Cart::instance('pc_build')->content();
        $build_amount = Cart::instance('pc_build')->total();
        $tax_build = 0;

        foreach ($build_products as $key => $value) {
            $tax_build = $tax_build + $value->options->tax;
        }

        // $pdf = \App::make('dompdf.wrapper');
        // $pdf->loadHTML($view);
        // return $pdf->stream('cotizacion.pdf');
        return view('pdf.cotizacion', compact('build_products','build_amount','tax_build'));
    }
}
