<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class BannerType extends Model{
	use Sluggable;

	protected $table = 'banner_types';

	protected $fillable = ['nombre', 'descripcion', 'estado'];

	public $timestamps = false;

	public function sluggable(){
		return [
			'slug' => ['source' => 'nombre']
		];
	}

	public function banners(){
		return $this->hasMany('App\Banner', 'banner_types_id');
	}

}
