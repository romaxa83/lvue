<?php

namespace App\Services\User;

use App\Models\User\User;
use DB;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function create(array $data): User
    {
        DB::beginTransaction();
        try {

            $model = new User();
            $model->name = $data['name'];
            $model->email = $data['email'];
            $model->password = Hash::make($data['password']);

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
