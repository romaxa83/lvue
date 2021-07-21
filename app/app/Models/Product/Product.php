<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property int sort
 * @property bool active
 * @property string title
 * @property string description
 * @property string price
 * @property string image
 * @property string created_at
 * @property string updated_at
 */

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $casts = [
        'active' => 'boolean',
    ];
}

