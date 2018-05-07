<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class DocumentCategory extends Model{
	use Sluggable;

	protected $table = 'document_categories';

	protected $fillable = ['nombre', 'descripcion', 'estado'];

	public $timestamps = false;

	public function sluggable(){
		return [
			'slug' => ['source' => 'nombre']
		];
	}

	public function docs(){
		return $this->hasMany('App\Document', 'document_category_id');
	}

}
