<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Article extends Model{
	use Sluggable;

	protected $table = 'articles';

	protected $fillable = ['titulo', 'texto', 'article_types_id', 'estado'];

	public $timestamps = false;

	public function sluggable(){
		return [
			'slug' => ['source' => 'titulo']
		];
	}

	public function article_types(){
		return $this->belongsTo('App\ArticleType');
	}


}
