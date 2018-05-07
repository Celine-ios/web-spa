<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Discount extends Model{
    use Sluggable;

    protected $table = 'discounts';

    protected $fillable = [
        'nombre','tipo_cupon','activar_codigo','codigo','discount', 'fecha_inicio','fecha_fin','estado'
    ];

    public function products(){
		return $this->belongsToMany('App\Product', 'discount_product');
	}

    public function subcategory(){
		return $this->belongsToMany('App\ProductSubcategory', 'discount_product_subcategory');
	}

    public function sluggable(){
        return [
            'slug' => ['source' => 'nombre']
        ];
    }
}
