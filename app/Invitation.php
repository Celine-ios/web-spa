<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Invitation extends Model
{
  use Sluggable;
  protected $table = 'invitations';
  protected $primarykey = 'id';

  protected $fillable = ['name', 'cc', 'email', 'slug', 'estado'];

  public function sluggable(){
    return [
      'slug' => ['source' => 'name']
    ];
  }

}
