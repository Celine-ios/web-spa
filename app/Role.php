<?php

namespace App;

use Zizaco\Entrust\EntrustRole;
use Cviebrock\EloquentSluggable\Sluggable;

class Role extends EntrustRole{
    use Sluggable;

    protected $table = 'roles';
    protected $fillable = ['name', 'display_name', 'description'];

    public function sluggable(){
		return [
			'name' => ['source' => 'display_name']
		];
	}
}
