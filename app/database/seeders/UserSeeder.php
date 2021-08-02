<?php

namespace Database\Seeders;

use App\Models\User\User;
use App\Models\User\UserRole;

class UserSeeder extends BaseSeeder
{
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('users')->truncate();
        \DB::table('user_roles')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        if(User::count() === 0){
            $admin = User::factory()->create([
                'name' => 'admin',
                'email' => 'admin@admin.com',
            ]);
            UserRole::create([
                'user_id' => $admin->id,
                'role_id' => 1
            ]);

            random_int(2, 4);
            User::factory(15)->create()->each(function ($user){
                UserRole::create([
                    'user_id' => $user->id,
                    'role_id' => random_int(2, 4)
                ]);
            });
        }
    }
}
