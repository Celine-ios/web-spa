<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ProductBrand extends Model{
	use Sluggable;

	protected $table = 'product_brands';

	protected $fillable = ['nombre'];

	public $timestamps = false;

	public function sluggable(){
		return [
			'slug' => ['source' => 'nombre']
		];
	}

	public function products(){
		return $this->hasMany('App\Product', 'brands_id');
	}

}
