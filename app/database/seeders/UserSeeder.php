<?php

namespace Database\Seeders;

use App\Models\User\User;

class UserSeeder extends BaseSeeder
{
    public function run()
    {
        User::factory(30)->create();
    }
}
