<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSubCategoryProduct extends Model
{
    protected $table = 'product_subcategory_product';
    protected $fillable = ['product_subcategory_id', 'product_id'];
    public $timestamps = false;

    public function subCategory()
    {
      return $this->belongsTo('App\ProductSubcategory','id');
    }
}
