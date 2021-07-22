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

    //relations

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}

