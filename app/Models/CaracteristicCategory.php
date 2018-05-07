<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaracteristicCategory extends Model
{
	protected $fillable  = ['id_caracteristic_category','category_name','state'];
	protected $primaryKey  = "id_caracteristic_category";

	public function caracteristics()
    {
        return $this->belongsToMany('App\Models\Caracteristic', 'caracteristic_category_caracteristics', 'fk_category','fk_caracteristic')->orderBy('name_caracteristic','asc');
    }

}
