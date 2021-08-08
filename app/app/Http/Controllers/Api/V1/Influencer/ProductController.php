<?php

namespace App\Http\Controllers\Api\V1\Influencer;

use App\Http\Controllers\Api\ApiController;
use App\Models\Product\Product;
use App\Repositories\Product\ProductRepository;
use App\Resources\Product\ProductResource;
use App\Services\Product\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            // 60 * 30 = 30min
            $products = \Cache::remember('products', 60 * 30, function() use ($request){
                sleep(2);

                return Product::all();
            });

            if($s = $request->input('s')){
                $products = $products->filter(function (Product $product) use($s) {
                    return Str::contains($product->title, $s);
                });
            }

            return ProductResource::collection($products);
        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }

    // детальнее расписан вариант выше
//    public function list(Request $request)
//    {
//        try {
//
//            $result = \Cache::get('products');
//            if($result){
//                return $result;
//            }
//
//            sleep(2);
//
//            $query = Product::query();
//            if($s = $request->input('s')){
//                $query->whereRaw("title LIKE '%{$s}%'");
//            }
//
//            $resource = ProductResource::collection($query->get());
//
//            \Cache::set('products', $resource, 5);
//            return $resource;
//        } catch (\Exception $e){
//            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
//        }
//    }
}

