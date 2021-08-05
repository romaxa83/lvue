<?php

namespace App\Services\Product;

use App\Models\Product\Link;
use App\Models\Product\LinkProduct;
use App\Models\User\User;
use DB;
use Illuminate\Support\Str;

class LinkService
{
    public function create(array $data, User $user): Link
    {
        DB::beginTransaction();
        try {
            $model = new Link();
            $model->user_id = $user->id;
            $model->code = Str::random(6);
            $model->save();

            foreach ($data['productIds'] as $id){
                LinkProduct::create([
                    'link_id' => $model->id,
                    'product_id' => $id
                ]);
            }

            DB::commit();

            return $model;
        } catch (\Throwable $e) {
            DB::rollBack();
            \Log::error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }
}


