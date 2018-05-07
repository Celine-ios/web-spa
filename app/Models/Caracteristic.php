<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caracteristic extends Model
{
	protected $fillable  = ['id_caracteristic','name_caracteristic'];
	protected $primaryKey  = "id_caracteristic";
}
