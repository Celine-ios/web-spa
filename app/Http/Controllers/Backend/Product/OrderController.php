<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Order;
use App\OnlineOrder;

use MP;
use Mail;
use App\Mail\SendEmail;
use App\Mail\SendRejectedMail;


class OrderController extends Controller{
    public function index(){
        $orders = Order::orderBy('created_at','DESC')->paginate(10);

        return view('admin.product.orders', compact('orders'));
    }

    public function show($id){
        $order = Order::find($id);
        if ($order) {
            return view('admin.product.orderview', compact('order'));
        }
    }

    public function test($id){
        $order = Order::find($id);
        if ($order && $order->tipo_pago == 'en_linea') {
            if ($order->online_order->collection_status == 'approved') {
                $order->fill(['estado' => 'aprobado'])->save();
            } elseif ($order->online_order->collection_status == 'rejected' || $order->online_order->collection_status == 'null') {
                $order->fill(['estado' => 'rechazado'])->save();
            } elseif ($order->online_order->collection_status == 'in_process' || $order->online_order->collection_status == 'pending') {
                $payment_info = MP::get("/collections/notifications/" . $order->online_order->collection_id);
                $merchant_order_info = MP::get("/merchant_orders/" . $payment_info["response"]["collection"]["merchant_order_id"]);

                if ($merchant_order_info["status"] == 200) {
                    $paid_amount = 0;
                    $pago        = null;

                    foreach ($merchant_order_info["response"]["payments"] as $key => $payment) {
                        $pago = $payment;
                    }

                    $online_order = OnlineOrder::where('collection_id', $order->online_order->collection_id)->first();

                    if ($online_order) {
                        if ($pago['status'] !== 'in_process') {
                            $online_order->fill([
                                'collection_status' => $pago['status']
                                ])->save();

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
            }
        }

        \Session::flash('message', 'Orden Actualizada');

        return redirect()->back();
    }

    public function approve($id){
        try {
            $order = Order::find($id);
            if ($order && $order->tipo_pago == 'contraentrega') {
                if ($order->estado != 'pendiente') {
                    throw new \Exception("La orden no puede ser aprobada", 1);    
                }

                $paid_amount = 0;
                foreach ($order->products as $product) {
                    $paid_amount += $product->pivot->unit_price * $product->pivot->units;
                }
                $order->fill(['estado' => 'aprobado'])->save();
                $text = 'Su pedido #'.str_pad($order->id, 6, "0", STR_PAD_LEFT).' ha sido aprobado correctamente';
                $user = $order->shipping_order;
                array_add($order,'aprobacion','1');
                Mail::to($user->email)
                ->bcc(env('MAIL_FROM'), '')
                ->send(new SendEmail($order, $paid_amount));


                \Session::flash('message', 'Orden Aprobada');
                return redirect('admin/order');
            } else {
                throw new \Exception("Orden no encontrada", 1);
            }
        } catch (\Exception $e) {
            \Session::flash('message-error', $e->getMessage());
            return redirect('admin/order');
        }
    }

    public function reject($id){
        try {
            $order = Order::find($id);
            if ($order && $order->tipo_pago == 'contraentrega') {
                if ($order->estado != 'pendiente') {
                    throw new \Exception("La orden no puede ser rechazada", 1);    
                }

                $paid_amount = 0;
                foreach ($order->products as $product) {
                    $paid_amount += $product->pivot->unit_price * $product->pivot->units;
                }

                $order->fill(['estado' => 'rechazado'])->save();
                Mail::to($order->shipping_order->email)
                ->bcc(env('MAIL_FROM'), '')
                ->send(new SendRejectedMail($order));


                \Session::flash('message', 'Orden Rechazada');
                return redirect('admin/order');
            } else {
                throw new \Exception("Orden no encontrada", 1);
            }
        } catch (\Exception $e) {
            \Session::flash('message-error', $e->getMessage());
            return redirect('admin/order');
        }
    }

    public function guide($id){
        try {
            $order = Order::find($id);
            if ($order && in_array($order->estado, ['aprobado', 'completado'])) {
                $orden = 'Guia_Orden_'.str_pad($id, 6, "0", STR_PAD_LEFT).'.pdf';
                $ship = $order->shipping_order;

                // return view('emails.ship', compact('ship'));

                $view =  \View::make('emails.ship', compact('ship'))->render();
                $pdf = \App::make('dompdf.wrapper');
                $pdf->loadHTML($view);

                return $pdf->download($orden);
            } else {
                throw new \Exception("Orden no encontrada", 1);
            }
        } catch (\Exception $e) {
            \Session::flash('message-error', $e->getMessage());
            return redirect('admin/order');
        }
    }

    public function send($id){
        try {
            $order = Order::find($id);
            if ($order && $order->estado == 'aprobado') {                
                $order->fill(['estado' => 'completado'])->save();
                if ($order->estado == 'completado') {

                    foreach ($order->products as $product) {
                        if ($product->quantity > 0) {
                            $product->quantity = $product->quantity - 1;
                            $product->save();
                        } else {
                            throw new \Exception("El producto ".$product->title." no puede ser enviado", 1);
                        }
                    }

                    $text = 'Su pedido #'.str_pad($order->id, 6, "0", STR_PAD_LEFT).' ha sido enviado correctamente';
                    $ship = $order->shipping_order;
                    $client = (object) ['Cliente' => $ship->nombres.' '.$ship->apellidos, 'Fecha_de_Pedido' => $order->created_at];

                    $mail = Mail::send('emails.message',  ['client' => $client, 'text' => $text], function($message) use ($ship){
                        $message->subject('Aprobación de Pedido');
                        $message->to($ship->email, $ship->nombres.' '.$ship->apellidos);
                    });

                    \Session::flash('message', 'Pedido Enviado Correctamente');
                    return redirect('admin/order');
                } else {
                    throw new \Exception("El pedido no puede ser enviado", 1);
                }
            } else {
                throw new \Exception("El pedido no puede ser enviado", 1);
            }
        } catch (\Exception $e) {
            \Session::flash('message-error', $e->getMessage());
            return redirect('admin/order');
        }
    }

    public function quick_update(Request $request){
        try {
            $validator = \Validator::make($request->all(), [
                'value' => 'required',
                'pk'    => 'required',
                'name'  => 'required',
                ]);

            if ($validator->fails()) {
                return \Response::json(['error' => $validator->errors()], 400);
            } else {
                $product = OnlineOrder::find($request->pk);

                if ($product) {
                    $product->fill([$request->name => $request->value])->save();

                    if ($product) {
                        return \Response::json(['status' => 1], 200);
                    } else {
                        throw new \Exception("Error en la actualización del registro", 400);    
                    }
                } else {
                    throw new \Exception("Registro no Encontrado, por favor recargar la página", 400);
                }
            }
        } catch (\Exception $e) {
            return \Response::json(['error' => $e->getMessage()], $e->getCode());
        }
    }
}
