<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductNotify extends Model{
    protected $table    = 'product_notifies';
    protected $fillable = ['user_id', 'product_id'];
    public $timestamps  = false;

    public function products(){
        return $this->belongsTo('App\Product', 'product_id');
    }

    public function users(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
