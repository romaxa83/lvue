<?php

namespace Database\Factories\Order;

use App\Models\Order\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    protected $model = Item::class;

    public function definition(): array
    {
        return [
            'product_title' => $this->faker->text(15),
            'price' => $this->faker->numberBetween(10, 100),
            'quantity' => $this->faker->numberBetween(1, 5)
        ];
    }
}
