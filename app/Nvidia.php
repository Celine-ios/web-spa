<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Nvidia extends Model{
	use Sluggable;

	protected $table = 'nvidias';

    protected $fillable = ['id','title','link_imagen','html','estado'];

    public function sluggable(){
        return [
            'slug' => ['source' => 'title']
        ];
    }
}
