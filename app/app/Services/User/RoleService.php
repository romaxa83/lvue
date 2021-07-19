<?php

namespace App\Services\User;

use App\Models\User\Role;
use DB;

class RoleService
{
    public function create(array $data): Role
    {
        DB::beginTransaction();
        try {

            $model = new Role();
            $model->name = $data['name'];
            $model->sort = $data['sort'] ?? 0;
            $model->active = $data['active'] ?? true;

            $model->save();

            foreach ($data['permissions'] ?? [] as $item){
                $model->permissions()->attach($item);
            }

            DB::commit();

            return $model;
        } catch (\Throwable $e) {
            DB::rollBack();
            \Log::error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

    public function edit(array $data, Role $model): Role
    {
        DB::beginTransaction();
        try {

            $model->name = $data['name'];

            $model->save();

            DB::commit();

            return $model;
        } catch (\Throwable $e) {
            DB::rollBack();
            \Log::error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }
}

