<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    protected $table = 'roles';

    protected $casts = [
        'active' => 'boolean',
    ];

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(
            Permission::class,
            'role_permission_relations',
            'role_id', 'permission_id'
        );
    }
}

