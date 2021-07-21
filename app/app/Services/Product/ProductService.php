<?php

namespace App\Services\Product;

use App\Models\Product\Product;
use Illuminate\Support\Facades\Storage;
use DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class ProductService
{
    public function create(array $data): Product
    {
        DB::beginTransaction();
        try {

            $model = new Product();
            $model->title = $data['title'];
            $model->description = $data['description'];
            $model->price = $data['price'];
            $model->sort = $data['sort'] ?? 0;
            $model->active = $data['active'] ?? true;

            if(isset($data['image'])){
                /** @var $file UploadedFile */
                $file = $data['image'];

                $basename = Str::random(10);

                $url = Storage::disk('public')
                    ->putFileAs('product/image', $file, $basename. '.' . $file->extension());

                $model->image = env('APP_URL') .'/storage/'. $url;
            }

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

