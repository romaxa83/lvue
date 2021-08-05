<?php

namespace App\Http\Controllers\Api\V1\Influencer;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Api\V1\Link;
use App\Resources\Product\LinkResource;
use App\Services\Product\LinkService;

class LinkController extends ApiController
{
    public function __construct(
        protected LinkService $service
    )
    {}

    public function create(Link\Create $request)
    {
        try {
            $user = \Auth::user();

            $model = $this->service->create($request->all(), $user);

            return LinkResource::make($model);
        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }
}
