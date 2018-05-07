<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PushSubscription extends Model{
    protected $table    = 'push_subscriptions';
    protected $fillable = ['token', 'tipo_archivo'];
}
