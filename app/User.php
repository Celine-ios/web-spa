<?php

namespace App;

use App\Notifications\UserResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cviebrock\EloquentSluggable\Sluggable;

class User extends Authenticatable{
    use Notifiable;
    use Sluggable;

    protected $fillable = [
        'first_name', 'last_name', 'username', 'email', 'password', 'avatar', 'birthday', 'city'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token){
        $this->notify(new UserResetPassword($token));
    }

    public function setPasswordAttribute($valor){
        if(!empty($valor)){
            $this->attributes['password'] = \Hash::make($valor);
        }
    }

    public function wishlists(){
		return $this->hasMany('App\Wishlist', 'users_id');
	}

    public function orders(){
		return $this->hasMany('App\Order', 'users_id');
	}

    public function social(){
		return $this->hasMany('App\UserSocialAccount', 'users_id');
	}

    public function pc_builds(){
		return $this->hasMany('App\PcBuild', 'users_id');
	}

    public function sluggable(){
        return [
            'slug' => ['source' => 'username']
        ];
    }
}
