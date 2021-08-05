<?php

namespace App\Services\Order;

use App\Models\Order\Item;
use App\Models\Order\Order;
use App\Models\Product\Link;
use App\Models\Product\Product;
use App\Repositories\Product\ProductRepository;
use Cartalyst\Stripe\Stripe;
use DB;

class OrderService
{
    public function __construct(
        protected ProductRepository $productRepository
    )
    {}

    public function create(array $data, Link $link)
    {
        DB::beginTransaction();
        try {

            $model = new Order();
            $model->name = $data['name'];
            $model->email = $data['email'];
            $model->code = $link->code;
            $model->user_id = $link->user_id;
            $model->influencer_email = $link->user->email;
            $model->address = $data['address'];
            $model->address_2 = $data['address_2'] ?? null;
            $model->city = $data['city'] ?? null;
            $model->country = $data['country'] ?? null;
            $model->zipcode = $data['zipcode'] ?? null;

            $model->save();

            $lineItems = [];
            foreach ($data['items'] as $item){
                /** @var $product Product */
                $product = $this->productRepository->getOneBy('id', ($item['productId']));

                $orderItem = new Item();
                $orderItem->order_id = $model->id;
                $orderItem->product_title = $product->title;
                $orderItem->price = $product->price;
                $orderItem->quantity = $item['quantity'];
                $orderItem->influencer_revenue = 0.1 * $product->price * $item['quantity'];
                $orderItem->admin_revenue = 0.9 * $product->price * $item['quantity'];

                $orderItem->save();

                $lineItems[] = [
                    'name' => $product->title,
                    'descriptions' => $product->description,
                    'images' => [
                        $product->image
                    ],
                    'amount' => 100 * $product->price,
                    'quantity' => $orderItem->quantity,
                    'currency' => 'usd',
                ];
            }

            // @todo написано на быструю руку , вынести в отдельный сервис
            $stripe = Stripe::make(env('STRIP_SECRET_KEY'));
            $source = $stripe->checkout()->sessions()->create([
                'payment_method_types' => ['card'],
                'line_items' => $lineItems,
                'success_url' => env('APP_URL') . '/success?source={CHECKOUT_SESSION_ID}',
                'cancel_url' => env('APP_URL') . '/error',
            ]);

            $model->transaction_id = $source['id'];
            $model->save();

            DB::commit();

            return $source;
        } catch (\Throwable $e) {

            DB::rollBack();
            \Log::error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

    public function edit(array $data, Order $model): Order
    {
        DB::beginTransaction();
        try {

            $model->name = $data['name'];
            $model->email = $data['email'];

            $model->save();

            DB::commit();

            return $model;
        } catch (\Throwable $e) {
            DB::rollBack();
            \Log::error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

    public function setStatusDone(Order $model): Order
    {
        $model->status = Order::DONE;
        $model->save();

        return $model;
    }
}


