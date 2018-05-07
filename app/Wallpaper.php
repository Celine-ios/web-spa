<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Carbon\Carbon;

class Wallpaper extends Model{
    use Sluggable;

    protected $table = 'wallpapers';

    protected $fillable = ['link', 'link_imagen', 'estado', 'tipo_archivo'];

	public function sluggable(){
		return [
			'slug' => ['source' => 'link']
		];
	}
}
