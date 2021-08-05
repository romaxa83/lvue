<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int link_id
 * @property int product_id
 */

class LinkProduct extends Model
{
    public $timestamps = false;

    protected $table = 'link_products';

    protected $fillable = ['link_id', 'product_id'];
}
