<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class caracteristic_product extends Model
{
	protected $fillable = ['fk_category','fk_product'];
	protected $guarded = ['id_caracteristic_product'];
	protected $primaryKey = "id_caracteristic_product";

	public function category()
	{
		return $this->belongsTo('App\Models\CaracteristicCategory','fk_category','id_caracteristic_category');
	}

}
