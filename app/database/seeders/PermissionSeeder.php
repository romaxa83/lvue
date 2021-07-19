<?php

namespace Database\Seeders;

use App\Services\User\PermissionService;

class PermissionSeeder extends BaseSeeder
{
    public function __construct(protected PermissionService $permissionService)
    {
        parent::__construct();
    }

    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('permissions')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $permissions = array_map('str_getcsv', file(__DIR__.'/_permissions.csv'));

        try {
            \DB::transaction(function () use ($permissions) {

                collect($permissions)->each(function($perm){
                    $temp['name'] = $perm[1];
                    $temp['sort'] = $perm[0];

                    $this->permissionService->create($temp);
                });
            });
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }
    }
}
