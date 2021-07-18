<?php

namespace App\Repositories\User;

use App\Models\User\Role;
use App\Repositories\AbstractRepository;

class RoleRepository extends AbstractRepository
{
    protected function modelClass(): string
    {
        return Role::class;
    }
}
