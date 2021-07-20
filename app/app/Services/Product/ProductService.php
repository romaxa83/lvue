<?php

namespace App\Services\Product;

use App\Models\Product\Product;
use App\Models\User\Role;
use DB;

class ProductService
{
    public function create(array $data): Product
    {
        DB::beginTransaction();
        try {

            $model = new Product();
            $model->title = $data['title'];
            $model->description = $data['description'];
            $model->price = $data['pricee'];
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

    public function edit(array $data, Product $model): Product
    {
        DB::beginTransaction();
        try {

            $model->title = $data['title'];

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

