<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model{
	use Sluggable;

	protected $table = 'products';

	protected $fillable = [
		'item_id', 'site_id', 'title', 'subtitle', 'seller_id', 'category_id', 'price', 'ml_price', 'local_price', 'quantity', 'video_id', 'sellerCustomField', 'description', 'specifications', 'permalink', 'status', 'ml_status', 'warranty', 'parent_item_id', 'published', 'product_special', 'cart_price_active', 'promo_price_active', 'processor_type', 'brands_id', 'tax', 'available_date'
	];

	public function categoryCaracteristic()
	{
		return $this->hasMany('App\Models\caracteristic_product', 'fk_product');
	}


	public function sluggable(){
		return [
			'slug' => ['source' => 'title']
		];
	}

	public function product_categories(){
		return $this->belongsToMany('App\ProductSubcategory', 'product_subcategory_product', 'product_id', 'product_subcategory_id');
	}

	public function tags(){
		return $this->belongsToMany('App\ProductTag', 'product_tag_product', 'product_id', 'product_tag_id');
	}

	public function filters(){
		return $this->belongsToMany('App\ProductFilter', 'product_filter_product', 'product_id', 'product_filter_id');
	}

	public function orders(){
		return $this->belongsToMany('App\Order', 'order_products')->withPivot('units', 'unit_price');
	}

	public function brands(){
		return $this->belongsTo('App\ProductBrand');
	}

	public function product_dependency(){
		return $this->belongsToMany('App\Product', 'product_subproduct', 'product_id', 'subproduct_id');
	}

	public function images(){
		return $this->hasMany('App\ProductPicture', 'products_id')->orderBy('posicion','asc');
	}

	public function videos(){
		return $this->hasMany('App\ProductVideos', 'products_id');
	}

	public function additional(){
		return $this->hasMany('App\ProductAdditional', 'products_id');
	}	

	public function discounts(){
		return $this->belongsToMany('App\Discount', 'discount_product');
	}
}
