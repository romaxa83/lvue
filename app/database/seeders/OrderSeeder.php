<?php

namespace Database\Seeders;

use App\Models\Order\Item;
use App\Models\Order\Order;

class OrderSeeder extends BaseSeeder
{
    public function run()
    {
//                \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
//        \DB::table('products')->truncate();
//        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        if(Order::count() === 0){
            Order::factory(20)->create()
                ->each(function ($order){
                    Item::factory(random_int(1,5))->create([
                        'order_id' => $order->id
                    ]);
                })
            ;
        }
    }
}
