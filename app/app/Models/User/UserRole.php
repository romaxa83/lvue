<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int user_id
 * @property int role_id
 */

class UserRole extends Model
{
    public $timestamps = false;

    protected $fillable = ['user_id', 'role_id'];
}

