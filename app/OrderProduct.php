<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class OrderProduct extends Model{
    use Sluggable;

    protected $table = 'order_products';

    protected $fillable = ['order_id', 'product_id', 'units', 'unit_price'];

    public function product(){
		return $this->hasOne('App\Product', 'id');
	}

    public function order(){
		return $this->hasOne('App\Order', 'id');
	}

    public function sluggable(){
		return [
			'slug' => ['source' => 'order_id']
		];
	}
}
