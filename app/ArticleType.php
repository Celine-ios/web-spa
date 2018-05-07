<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ArticleType extends Model{
	use Sluggable;

	protected $table = 'article_types';

	protected $fillable = ['nombre'];

	public $timestamps = false;

	public function sluggable(){
		return [
			'slug' => ['source' => 'nombre']
		];
	}

	public function articles(){
		return $this->hasMany('App\Article');
	}

}
