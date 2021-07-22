<?php

namespace App\Http\Controllers\Api\V1\Order;

use App\Http\Controllers\Api\ApiController;
use App\Models\Order\Order;
use App\Models\Product\Product;
use App\Repositories\Order\OrderRepository;
use App\Repositories\Product\ProductRepository;
use App\Resources\Order\OrderResource;
use App\Resources\Product\ProductResource;
use App\Services\Order\OrderService;
use App\Services\Product\ProductService;
use Illuminate\Http\Request;
use App\Http\Requests\Api\V1\Order as OrderRequest;

class OrderController extends ApiController
{
    public function __construct(
        protected OrderRepository $repository,
        protected OrderService $service
    )
    {}

    public function list(Request $request)
    {
        try {
            $models = $this->repository->getAllPaginator($request->all());

            return OrderResource::collection($models);
        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }

    public function one(Order $order)
    {
        try {
            return OrderResource::make($order);
        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }

    public function create(OrderRequest\Create $request)
    {
        try {
            $model = $this->service->create($request->all());

            return OrderResource::make($model);
        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }

    public function edit(OrderRequest\Update $request, Order $order)
    {
        try {
            $model = $this->service->edit($request->all(), $order);

            return OrderResource::make($model);
        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }

    public function delete(Request $request, Order $order)
    {
        try {
            $order->forceDelete();

            return $this->successJsonMessage([]);
        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }

}


