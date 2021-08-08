<?php

namespace App\Http\Controllers\Api\V1\Influencer;

use App\Http\Controllers\Api\ApiController;
use App\Models\Order\Order;
use App\Models\Product\Link;
use App\Repositories\Product\LinkRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class StatsController extends ApiController
{
    public function __construct(
        protected LinkRepository $repository,
        protected UserRepository $userRepository
    )
    {}

    public function index(Request $request)
    {
        try {
            $user = $request->user();

            $links = $this->repository->getAllBy('user_id', $user->id);

            return $links->map(function(Link $link){
                $orders = Order::query()
                    ->where('code', $link->code)
                    ->where('status', Order::DONE)
                    ->get();

                return [
                    'code' => $link->code,
                    'count' => $orders->count(),
                    'revenue' => $orders->sum(function(Order $order){
                        return $order->influencer_total;
                    }),
                ];
            });
        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }

    public function ranking(Request $request)
    {
        try {

            dd(Redis::zrange('rankings', 0, -1));

            return ;
//            return Redis::zrevrange('rankings', 0, -1, 'WITHSCORES');
        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }
}
