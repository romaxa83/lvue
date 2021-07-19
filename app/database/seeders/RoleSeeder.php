<?php

namespace Database\Seeders;

use App\Models\User\Permission;
use App\Models\User\Role;
use App\Services\User\RoleService;

class RoleSeeder extends BaseSeeder
{
    public function __construct(protected RoleService $roleService)
    {
        parent::__construct();
    }

    public function run()
    {
        if(Role::count() === 0){

//        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
//        \DB::table('roles')->truncate();
//        \DB::table('role_permission_relations')->truncate();
//        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            try {

                $roles = $this->roles();

                \DB::transaction(function () use ($roles) {

                    collect($roles)->each(function($role, $key){
                        $sort = $key + 1;
                        $temp['sort'] = $sort;
                        $temp['name'] = $role;

                        if('admin' === $temp['name']){
                            $somePermission = Permission::all()->pluck('id')->toArray();
                        } else {
                            $somePermission = Permission::orderBy(\DB::raw('RAND()'))->take(random_int(2, 4))->pluck('id')->toArray();
                        }

                        $temp['permissions'] = $somePermission;

                        $this->roleService->create($temp);
                    });
                });
            } catch (\Throwable $e) {
                dd($e->getMessage());
            }
        }
    }

    public function roles()
    {
        return [
            'admin',
            'manager',
            'moderator',
            'writer',
        ];
    }
}
