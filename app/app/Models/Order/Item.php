<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property int order_id
 * @property string product_title
 * @property float price
 * @property int quantity
 * @property float influencer_revenue
 * @property float admin_revenue
 * @property string created_at
 * @property string updated_at
 */

class Item extends Model
{
    use HasFactory;

    protected $table = 'order_items';
}
