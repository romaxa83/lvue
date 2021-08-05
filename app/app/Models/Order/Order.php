<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int id
 * @property int status
 * @property string name
 * @property string email
 * @property string code
 * @property int user_id
 * @property string influencer_email
 * @property string address
 * @property string address_2
 * @property string city
 * @property string country
 * @property string zipcode
 * @property string|null transaction_id
 * @property string created_at
 * @property string updated_at
 */

class Order extends Model
{
    use HasFactory;

    const CREATE = 'create';
    const PROCESS = 'process';
    const DONE = 'done';

    protected $table = 'orders';

    public static function statusList(): array
    {
        return [
            self::CREATE,
            self::PROCESS,
            self::DONE,
        ];
    }

    public function getTotalAttribute()
    {
        return $this->items->sum(function(Item $model){
            return $model->price * $model->quantity;
        });
    }

    public function getAdminTotalAttribute()
    {
        return $this->items->sum(function(Item $model){
            return $model->admin_revenue;
        });
    }

    public function getInfluencerTotalAttribute()
    {
        return $this->items->sum(function(Item $model){
            return $model->influencer_revenue;
        });
    }

    //relations

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}

