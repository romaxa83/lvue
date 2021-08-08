<?php

namespace App\Console\Commands;

use App\Models\Order\Order;
use App\Models\User\User;
use App\Repositories\User\UserRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;


class UpdateRankingsCommand extends Command
{
    protected $signature = 'update:rankings';

    public function __construct(protected UserRepository $userRepository)
    {
        parent::__construct();
    }

    public function handle()
    {
        $users = $this->userRepository->getAllBy('is_influencer', true);

        $users->each(function(User $user){
            $orders = Order::query()
                ->where('user_id', $user->id)
                ->where('status', Order::DONE)
                ->get();

            $revenue = $orders->sum(function(Order $order){
                return (int)$order->influencer_total;
            });

            // @see https://redis.io/commands/ZADD

            Redis::zadd('rankings', $revenue, $user->name);
        });
    }
}
