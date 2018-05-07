<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ProductTag extends Model{
    use Sluggable;

    protected $table = 'product_tags';

    protected $fillable = ['nombre'];

    public $timestamps = false;

    public function sluggable(){
        return [
            'slug' => ['source' => 'nombre']
        ];
    }

    public function products(){
        return $this->belongsToMany('App\Product', 'product_tag_product', 'products_id', 'tags_id');
    }
}
