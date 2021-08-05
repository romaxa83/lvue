<?php

namespace App\Models\User;

use App\Models\Order\Order;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

/**
 * @property int id
 * @property string name
 * @property string email
 * @property Carbon email_verified_at
 * @property string password
 * @property string remember_token
 * @property Carbon created_at
 * @property Carbon updated_at
 * @property bool is_influencer
 */


class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use HasApiTokens;

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_influencer' => 'boolean',
    ];

    public function isInfluencer(): bool
    {
        return $this->is_influencer;
    }

    public function role(): HasOneThrough
    {
        return $this->hasOneThrough(
            Role::class,
            UserRole::class,
            'user_id',
            'id',
            'id',
            'role_id'
        );
    }

    // переопределение метода для паспорт
    public function findForPassport($username)
    {
        return self::where('id', $username)->first();
    }

    public function getRevenueAttribute()
    {
        $orders = Order::where('user_id', $this->id)
            ->where('status', Order::DONE)->get();

        return $orders->sum(function (Order $order){
            return $order->influencer_total;
        });
    }
}
