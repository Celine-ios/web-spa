<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PcBuildProduct extends Model{
	protected $table    = 'pc_build_products';
	public $timestamps  = false;
	protected $fillable = ['pc_build_id', 'product_id', 'cantidad'];

	public function product(){
		return $this->hasOne('App\Product', 'id', 'products_id');
	}
}
