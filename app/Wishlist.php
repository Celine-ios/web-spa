<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model{
    protected $table    = 'wishlists';

    public $timestamps  = false;

    protected $fillable = ['users_id', 'products_id', 'activo'];

    public function product(){
        return $this->hasOne('App\Product', 'id', 'products_id');
	}
}
