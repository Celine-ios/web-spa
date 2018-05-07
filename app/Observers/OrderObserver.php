<?php

namespace App\Observers;

use Auth;
use App\Order;
use App\PushSubscription;

use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;

class OrderObserver{

    public function created(Order $order){
        $subscription = PushSubscription::where('user_type', 'admin')->pluck('token')->toArray();

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


    /*public function saved($model){
        if ($model->wasRecentlyCreated == true) {            
            $action = 'new';
        } else {
            $action = 'updated';
        }
    }*/
}
