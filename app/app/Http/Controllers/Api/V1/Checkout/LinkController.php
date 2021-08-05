<?php

namespace App\Http\Controllers\Api\V1\Checkout;

use App\Http\Controllers\Api\ApiController;
use App\Repositories\Product\LinkRepository;
use App\Resources\Product\LinkResource;

class LinkController extends ApiController
{
    public function __construct(
        protected LinkRepository $repository
    )
    {}

    public function show($code)
    {
        try {
            $model = $this->repository->getOneBy('code', $code);

            return LinkResource::make($model);
        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }
}
