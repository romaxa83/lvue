<?php

namespace App\Repositories\User;

use App\Models\User\Permission;
use App\Repositories\AbstractRepository;

class PermissionRepository extends AbstractRepository
{
    protected function modelClass(): string
    {
        return Permission::class;
    }
}

