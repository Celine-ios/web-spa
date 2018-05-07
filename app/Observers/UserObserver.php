<?php

namespace App\Observers;

use Auth;
use App\User;

use Mailchimp;

class OrderObserver{

    public function created(User $user){
        $exists = \Mailchimp::check('439d86cfe6', $user->email);

        if (!$exists) {
            $register = \Mailchimp::subscribe('439d86cfe6', $user->email, $user->toArray(), false);
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
