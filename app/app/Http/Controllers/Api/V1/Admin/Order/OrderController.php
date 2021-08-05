<?php

namespace App\Http\Controllers\Api\V1\Admin\Order;

use App\Http\Controllers\Api\ApiController;
use App\Models\Order\Item;
use App\Models\Order\Order;
use App\Repositories\Order\OrderRepository;
use App\Resources\Order\OrderResource;
use App\Services\Order\OrderService;
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

    public function export()
    {
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=orders.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
        ];

        $callback = function (){
            $orders = Order::all();
            $file = fopen('php://output', 'w');

            //Header Row
            fputcsv($file, ['ID', 'Name', 'Email', 'Product title', 'Price', 'Quantity']);
            // Body
            foreach ($orders as $order){
                fputcsv($file, [$order->id, $order->name, $order->email, '', '', '']);

                foreach ($order->items as $item){
                    /** @var $item Item */
                    fputcsv($file, ['', '', '', $item->product_title, $item->price, $item->quantity]);
                }
            }

            fclose($file);
        };

        return \Response::stream($callback, 200, $headers);
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


