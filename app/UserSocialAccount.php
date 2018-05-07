<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSocialAccount extends Model{
    protected $fillable = ['users_id', 'provider_user_id', 'provider'];

    public function user(){
        return $this->belongsTo('App\User',  'users_id');
    }
}
