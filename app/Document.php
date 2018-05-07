<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Document extends Model{
	use Sluggable;

	protected $table = 'documents';

	protected $fillable = ['titulo', 'link_documento', 'document_category_id'];

	public function doc_cat(){
		return $this->belongsTo('App\DocumentCategory', 'document_category_id');
	}

	public function sluggable(){
		return [
			'slug' => ['source' => 'link_documento']
		];
	}
}
