<?php

namespace App\Listeners\Product;

class ProductCacheFlush
{
    public function handle()
    {
        try {
            \Cache::forget('products');
        } catch (\Throwable $e) {
            \Log::error($e->getMessage());
        }
    }
}
