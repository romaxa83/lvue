<?php

namespace App\Http\Controllers\Api\V1\Influencer;

use App\Http\Controllers\Api\ApiController;
use App\Models\Order\Order;
use App\Models\Product\Link;
use App\Models\User\User;
use App\Repositories\Product\LinkRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;

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

            $rankings = $users->map(function(User $user){
                $orders = Order::query()
                    ->where('user_id', $user->id)
                    ->where('status', Order::DONE)
                    ->get();

                return [
                    'name' => $user->name,
                    'revenue' => $orders->sum(function(Order $order){
                        return (int)$order->influencer_total;
                    }),
                ];
            });

            return $rankings->sortByDesc('revenue')->values();
        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }
}
