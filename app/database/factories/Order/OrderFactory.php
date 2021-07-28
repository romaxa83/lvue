<?php

namespace Database\Factories\Order;

use App\Models\Order\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        $st = Order::statusList();
        return [
            'name' => $this->faker->firstName,
            'email' => $this->faker->email,
            'status' => $st[random_int(0,2)],
            'created_at' => $this->faker->dateTime
        ];
    }
}
