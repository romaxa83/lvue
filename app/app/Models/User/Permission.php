<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property int sort
 * @property bool active
 * @property string name
 * @property string created_at
 * @property string updated_at
 */

class Permission extends Model
{
    protected $table = 'permissions';

    protected $casts = [
        'active' => 'boolean',
    ];
}
