<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ProductFilter extends Model{
    use Sluggable;

    protected $table    = 'product_filters';
    protected $fillable = ['nombre'];
    public $timestamps  = false;

    public function sluggable(){
        return [
            'slug' => ['source' => 'nombre']
        ];
    }

    public function product_categories(){
		return $this->belongsToMany('App\ProductSubcategory', 'product_filter_product_subcategory', 'product_filter_id', 'product_subcategory_id');
	}

    public function products(){
		return $this->belongsToMany('App\Product', 'product_filter_product', 'product_filter_id', 'product_id');
	}
}
