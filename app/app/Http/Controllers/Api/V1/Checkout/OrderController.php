<?php

namespace App\Http\Controllers\Api\V1\Checkout;

use App\Http\Controllers\Api\ApiController;
use App\Models\Order\Order;
use App\Models\Product\Link;
use App\Repositories\Order\OrderRepository;
use App\Repositories\Product\LinkRepository;
use App\Resources\Order\OrderResource;
use App\Services\Order\OrderService;
use App\Http\Requests\Api\V1\Order as OrderRequest;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Request;

class OrderController extends ApiController
{
    public function __construct(
        protected OrderService $service,
        protected OrderRepository $repository,
        protected LinkRepository $linkRepository
    )
    {}

    public function create(OrderRequest\Create $request)
    {
        try {
            /** @var $link Link */
            $link = $this->linkRepository->findOneBy('code', $request['code']);

            $model = $this->service->create($request->all(), $link);

            return OrderResource::make($model);
        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }

    public function confirm(Request $request)
    {
        try {
            /** @var $model Order */
            $model = $this->repository->findOneBy('transaction_id', $request['source']);

            $model = $this->service->setStatusDone($model);

            // @todo рассылку вынести в джобы
            \Mail::send('mail.admin', ['order' => $model], function(Message $message){
                $message->to('admin@admin.com');
                $message->subject('A new order has been completed!');
            });

            \Mail::send('mail.influencer', ['order' => $model], function(Message $message) use ($model){
                $message->to($model->influencer_email);
                $message->subject('A new order has been completed!');
            });

            return OrderResource::make($model);
        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }
}


