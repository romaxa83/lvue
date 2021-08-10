<?php

namespace App\Http\Controllers\Api\V1\Influencer;

use App\Http\Controllers\Api\ApiController;
use App\Models\Order\Order;
use App\Models\Product\Link;
use App\Models\User\User;
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

            $users = $this->userRepository->getAllBy('is_influencer', true);
            $temp = [];
            $users->each(function(User $user, $i) use (&$temp){
                $orders = Order::query()
                    ->where('user_id', $user->id)
                    ->where('status', Order::DONE)
                    ->get();

                $revenue = $orders->sum(function(Order $order){
                    return (int)$order->influencer_total;
                });

                $temp[$i]['id'] = $user->id;
                $temp[$i]['name'] = $user->name;
                $temp[$i]['revenue'] = $revenue;
            });

            return $temp;

//            dd(Redis::zrange('rankings', 0, -1));

//            return ;
//            return Redis::zrevrange('rankings', 0, -1, 'WITHSCORES');
        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }
}
