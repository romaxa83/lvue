<?php

namespace App\Services\Order;

use App\Models\Order\Order;
use DB;

class OrderService
{
    public function create(array $data): Order
    {
        DB::beginTransaction();
        try {

            $model = new Order();
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

    public function edit(array $data, Order $model): Order
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


