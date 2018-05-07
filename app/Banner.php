<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Carbon\Carbon;
use Storage;
use File;

class Banner extends Model{
    use Sluggable;

    protected $table = 'banners';

    protected $fillable = ['link', 'link_imagen', 'estado', 'banner_types_id'];

	public function sluggable(){
		return [
			'slug' => ['source' => 'link_imagen']
		];
	}

	public function banner_types(){
		return $this->belongsTo('App\BannerType', 'banner_types_id');
	}
}
