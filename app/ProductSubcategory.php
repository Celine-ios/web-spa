<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ProductSubcategory extends Model{
    use Sluggable;

    protected $table    = 'product_subcategories';
    protected $fillable = ['nombre', 'product_categories_id'];
    public $timestamps  = false;


    public function categoryCaracteristics()
    {
        return $this->belongsToMany('App\Models\CaracteristicCategory', 'caracteristic_product_categories', 'fk_product_category','fk_category');
    }

    public function products(){
        return $this->belongsToMany('App\Product', 'product_subcategory_product', 'product_id', 'product_subcategory_id');
    }

    public function categories(){
        return $this->belongsTo('App\ProductCategory', 'product_categories_id');
    }

    public function discounts(){
		return $this->belongsToMany('App\Discount', 'discount_product_subcategory');
	}

    public function filters(){
		return $this->belongsToMany('App\ProductFilter', 'product_filter_product_subcategory');
	}

    public function sluggable(){
        return [
            'slug' => ['source' => 'nombre']
        ];
    }
}
