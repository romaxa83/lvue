<?php

namespace Database\Seeders;

use App\Models\User\User;

class UserSeeder extends BaseSeeder
{
    public function run()
    {
//        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
//        \DB::table('users')->truncate();
//        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        if(User::count() === 0){
            User::factory()->create([
                'name' => 'cubic',
                'email' => 'cubic@rubic.com',
                'role_id' => 1,
            ]);

            User::factory(30)->create();
        }
    }
}
