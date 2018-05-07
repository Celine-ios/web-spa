<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class caracteristic_category_caracteristic extends Model
{
	protected $primaryKey = "id_pivot_category_caracteristics";
	protected $fillable = ['fk_category','fk_caracteristic','state'];

	public function Category()
    {
        return $this->belongsTo('App\Models\CaracteristicCategory','id_caracteristic_category','fk_category');
    }
}
