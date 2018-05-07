<?php

namespace App;

use Zizaco\Entrust\EntrustPermission;
use Cviebrock\EloquentSluggable\Sluggable;

class Permission extends EntrustPermission{
    use Sluggable;

    protected $table = 'permissions';
    protected $fillable = ['name', 'display_name', 'description'];

    public function sluggable(){
		return [
			'name' => ['source' => 'display_name']
		];
	}
}
