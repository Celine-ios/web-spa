<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class OnlineOrder extends Model{
    use Sluggable;

    protected $table = 'online_orders';
    protected $primaryKey = 'orders_id';

    protected $fillable = ['orders_id', 'collection_id','collection_status', 'preference_id', 'external_reference', 'payment_type', 'transportadora', 'numero_guia', 'link_seguimiento'];

    public function sluggable(){
        return [
            'slug' => ['source' => 'collection_id']
        ];
    }
}
