<?php

namespace App\Http\Controllers\Api\V1\Influencer;

use App\Http\Controllers\Api\ApiController;
use App\Models\Product\Product;
use App\Repositories\Product\ProductRepository;
use App\Resources\Product\ProductResource;
use App\Services\Product\ProductService;
use Illuminate\Http\Request;

class ProductController extends ApiController
{
    public function __construct(
        protected ProductRepository $repository,
        protected ProductService $service
    )
    {}

    public function list(Request $request)
    {
        try {
            $query = Product::query();

            if($s = $request->input('s')){
                $query->whereRaw("title LIKE '%{$s}%'");
            }

            return ProductResource::collection($query->get());
        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }
}

