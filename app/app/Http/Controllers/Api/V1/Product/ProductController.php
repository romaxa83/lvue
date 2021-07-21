<?php

namespace App\Http\Controllers\Api\V1\Product;

use App\Http\Controllers\Api\ApiController;
use App\Models\Product\Product;
use App\Repositories\Product\ProductRepository;
use App\Resources\Product\ProductResource;
use App\Services\Product\ProductService;
use Illuminate\Http\Request;
use App\Http\Requests\Api\V1\Product as ProductRequest;

class ProductController extends ApiController
{
    public function __construct(
        protected ProductRepository $repository,
        protected ProductService $service
    )
    {}

    public function list(Request $request)
    {
        try {
            $models = $this->repository->getAllPaginator($request->all());

            return ProductResource::collection($models);
        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }

    public function one(Product $product)
    {
        try {
            return ProductResource::make($product);
        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }

    public function create(ProductRequest\Create $request)
    {
        try {
            $model = $this->service->create($request->all());

            return ProductResource::make($model);
        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }

    public function edit(ProductRequest\Update $request, Product $product)
    {
        try {
            $model = $this->service->edit($request->all(), $product);

            return ProductResource::make($model);
        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }

    public function delete(Request $request, Product $product)
    {
        try {
            $product->forceDelete();

            return $this->successJsonMessage([]);
        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }

}

