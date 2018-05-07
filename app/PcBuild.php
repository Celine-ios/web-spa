<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class PcBuild extends Model{
	use Sluggable;
    
    protected $table    = 'pc_builds';
    public $timestamps  = false;
    protected $fillable = ['users_id', 'titulo', 'activo', 'armado'];

    public function sluggable(){
        return [
            'slug' => ['source' => 'titulo']
        ];
    }

    public function products(){
        return $this->belongsToMany('App\Product', 'pc_build_products', 'pc_build_id', 'product_id')->withPivot('id', 'cantidad');
    }

    public function user(){
        return $this->hasOne('App\User', 'id', 'users_id');
    }

}
