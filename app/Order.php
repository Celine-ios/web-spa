<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Order extends Model{
    use Sluggable;

    protected $table = 'orders';

    protected $fillable = ['users_id', 'estado', 'tipo_pago'];

    public function users(){
		return $this->belongsTo('App\User');
	}

    public function products(){
		return $this->belongsToMany('App\Product', 'order_products')->withPivot('units', 'unit_price');
	}

    public function shipping_order(){
		return $this->hasOne('App\ShippingOrder', 'orders_id');
	}

    public function online_order(){
        return $this->hasOne('App\OnlineOrder', 'orders_id');
    }

    public function sluggable(){
        return [
            'slug' => ['source' => 'users_id']
        ];
    }
}
