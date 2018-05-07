<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ProductCategory extends Model{
	use Sluggable;

	protected $table = 'product_categories';

	protected $fillable = ['nombre', 'descripcion', 'estado'];

	public $timestamps = false;

	public function sluggable(){
		return [
			'slug' => ['source' => 'nombre']
		];
	}

	public function subcategories(){
		return $this->hasMany('App\ProductSubcategory', 'product_categories_id')->orderBy('nombre','asc');
	}
}
