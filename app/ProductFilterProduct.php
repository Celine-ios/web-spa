<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductFilterProduct extends Model
{
    protected $table = 'product_filter_product';
    protected $fillable = ['product_filter_id', 'product_id'];
    public $timestamps = false;
    protected $primaryKey = "product_filter_id";
}
