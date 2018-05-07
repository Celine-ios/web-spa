<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ProductVideos extends Model{
	use Sluggable;

	protected $table = 'product_videos';

	protected $fillable = ['link_video', 'products_id'];

	public $timestamps = false;

	public function sluggable(){
		return [
			'slug' => ['source' => 'link_video']
		];
	}

	public function products(){
        return $this->belongsTo('App\Product', 'products_id');
    }
}
