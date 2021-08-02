<?php

namespace App\Services\User;

use App\Models\User\User;
use App\Models\User\UserRole;
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

            UserRole::create([
                'user_id' => $model->id,
                'role_id' => $data['roleId']
            ]);

            DB::commit();

            return $model;
        } catch (\Throwable $e) {
            DB::rollBack();
            \Log::error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

    public function createFromRegister(array $data): User
    {
        DB::beginTransaction();
        try {

            $model = new User();
            $model->name = $data['name'];
            $model->email = $data['email'];
            $model->password = Hash::make($data['password']);
            $model->is_influencer = true;

            $model->save();

            DB::commit();

            return $model;
        } catch (\Throwable $e) {
            DB::rollBack();
            \Log::error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

    public function edit(array $data, User $model): User
    {
        DB::beginTransaction();
        try {
            $model->name = $data['name'];
            $model->email = $data['email'];

            $model->save();

            UserRole::where('user_id', $model->id)->delete();
            UserRole::create([
                'user_id' => $model->id,
                'role_id' => $data['roleId']
            ]);

            DB::commit();

            return $model;
        } catch (\Throwable $e) {
            DB::rollBack();
            \Log::error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

    public function editProfile(array $data, User $model): User
    {
        DB::beginTransaction();
        try {

            $model->name = $data['name'];
            $model->email = $data['email'];

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
