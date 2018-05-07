<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ProductAdditional extends Model{
    use Sluggable;

    protected $table = 'product_additionals';
    protected $fillable = ['title', 'content', 'products_id'];

    public function sluggable(){
        return [
            'slug' => ['source' => 'title']
        ];
    }

    public function products(){
        return $this->belongsTo('App\Product', 'products_id');
    }
}
