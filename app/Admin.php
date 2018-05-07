<?php

namespace App;

use App\Notifications\AdminResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cviebrock\EloquentSluggable\Sluggable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Admin extends Authenticatable{
    use Notifiable;
    use Sluggable;
    use EntrustUserTrait;

    protected $fillable = [
        'name', 'username', 'email', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token){
        $this->notify(new AdminResetPassword($token));
    }

    public function setPasswordAttribute($valor){
        if(!empty($valor)){
            $this->attributes['password'] = \Hash::make($valor);
        }
    }

    public function sluggable(){
        return [
            'slug' => ['source' => 'username']
        ];
    }
}
