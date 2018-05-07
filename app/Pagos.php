<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{

  protected $table = 'pagos';
  protected $primarykey = 'id';

  protected $fillable = ['name', 'cc', 'email', 'birday', 'direccion', 'tipe', 'eps', 'contacto', 'share', 'star', 'active' ];




}
