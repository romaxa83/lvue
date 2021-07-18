<?php

namespace Database\Seeders;

use App\Models\User\Role;

class RoleSeeder extends BaseSeeder
{
    public function run()
    {
        Role::factory(6)->create();
    }
}
