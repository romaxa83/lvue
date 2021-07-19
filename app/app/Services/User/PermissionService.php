<?php

namespace App\Services\User;

use App\Models\User\Permission;
use DB;

class PermissionService
{
    public function create(array $data): Permission
    {
        DB::beginTransaction();
        try {

            $model = new Permission();
            $model->name = $data['name'];
            $model->sort = $data['sort'] ?? 0;
            $model->active = $data['active'] ?? true;

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


