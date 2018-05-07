<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Carbon\Carbon;

class ProductPicture extends Model{
    use Sluggable;

    protected $table = 'product_pictures';
    protected $fillable = ['link_imagen', 'products_id'];

    public function sluggable(){
        return [
            'slug' => ['source' => 'link_imagen']
        ];
    }

    public function products(){
        return $this->belongsTo('App\Product', 'products_id');
    }
}
