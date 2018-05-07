<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ShippingOrder extends Model{
    use Sluggable;

    protected $table = 'shipping_orders';
    protected $primaryKey = 'orders_id';

    protected $fillable = ['dni','orders_id', 'email', 'nombres', 'apellidos', 'direccion', 'direccion_2', 'telefono', 'telefono_2', 'fax', 'ciudad'];

    public function sluggable(){
        return [
            'slug' => ['source' => 'orders_id']
        ];
    }
}
