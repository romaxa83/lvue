<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property int sort
 * @property bool active
 * @property string name
 * @property string created_at
 * @property string updated_at
 */

class Role extends Model
{
    use HasFactory;

    public const TABLE_NAME = 'roles';
    protected $table = 'roles';

    protected $casts = [
        'active' => 'boolean',
    ];
}

