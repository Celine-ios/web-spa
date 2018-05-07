<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductFilterProductSubcategory extends Model
{
    protected $table = 'product_filter_product_subcategory';
    protected $fillable = ['product_filter_id', 'product_subcategory_id'];
    public $timestamps = false;

}
