<?php

namespace App\Observers;

use Auth;
use App\Product;
use App\PushSubscription;
use App\User;
use App\ProductNotify;

use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;
use Mail;
use App\Mail\AvailableMessage;

class ProductObserver{

    public function created(Product $product){
        $subscription = PushSubscription::where('tipo_archivo', 'user')->pluck('token')->toArray();

        if (count($subscription) > 0) {
            $optionBuilder = new OptionsBuilder();
            $optionBuilder->setTimeToLive(60*20);

            $notificationBuilder = new PayloadNotificationBuilder('Tauret Computadores');
            $notificationBuilder->setBody('Nuevo: '.$product->title)
            ->setIcon(url('images/icono.png'))
            ->setClickAction(url('product/'.$product->slug))
            ->setSound('default');

            $dataBuilder = new PayloadDataBuilder();
            $dataBuilder->addData(['a_data' => 'my_data']);

            $option       = $optionBuilder->build();
            $notification = $notificationBuilder->build();
            $data         = $dataBuilder->build();

            $downstreamResponse = FCM::sendTo($subscription, $option, $notification, $data);

            $downstreamResponse->numberSuccess();
            $downstreamResponse->numberFailure();
            $downstreamResponse->numberModification();

            $downstreamResponse->tokensToDelete(); 
            $downstreamResponse->tokensToModify(); 
            $downstreamResponse->tokensToRetry();
        }
    }


    public function saved($model){
        if ($model->wasRecentlyCreated == true) {            
            $action = 'new';
        } else {
            $action = 'updated';
            if ($model->published && $model->quantity <= 5) {
                $mensaje = 'El producto '.$model->title. 'sólo tiene '.$model->quantity.' unidades disponibles';
                
                if ($model->quantity == 0) {
                    $mensaje = 'El producto '.$model->title. 'se encuentra agotado';
                }

                $subscription = PushSubscription::where('tipo_archivo', 'admin')->pluck('token')->toArray();

                if (count($subscription) > 0) {
                    $optionBuilder = new OptionsBuilder();
                    $optionBuilder->setTimeToLive(60*20);

                    $notificationBuilder = new PayloadNotificationBuilder('Tauret Computadores');
                    $notificationBuilder->setBody($mensaje)
                    ->setIcon(url('images/icono.png'))
                    ->setClickAction(url('product/'.$model->slug))
                    ->setSound('default');

                    $dataBuilder = new PayloadDataBuilder();
                    $dataBuilder->addData(['a_data' => 'my_data']);

                    $option       = $optionBuilder->build();
                    $notification = $notificationBuilder->build();
                    $data         = $dataBuilder->build();

                    $downstreamResponse = FCM::sendTo($subscription, $option, $notification, $data);

                    $downstreamResponse->numberSuccess();
                    $downstreamResponse->numberFailure();
                    $downstreamResponse->numberModification();

                    $downstreamResponse->tokensToDelete(); 
                    $downstreamResponse->tokensToModify(); 
                    $downstreamResponse->tokensToRetry();
                }
            } else {
                if ($model->published && $model->quantity > 0) {
                    $prueba = ProductNotify::where('product_id', $model->id)->where('active', 1)->get();

                    $message = (object) ['message' => 'El producto '.$model->title.' ya se encuentra disponible para su compra', 'email' =>env('MAIL_FROM'), 'nombre' => config('app.name'), 'title' => 'Producto Disponible', 'enlace' => url('product/'.$model->slug)];

                    foreach ($prueba as $p) {
                        $user = User::find($p->user_id);

                        if ($user) {
                            $mail = Mail::to($user->email)->send(new AvailableMessage($message, $user));
                            $p->active = 0;
                            $p->save();
                        }
                    }
                }
            }
        }
    }
}
