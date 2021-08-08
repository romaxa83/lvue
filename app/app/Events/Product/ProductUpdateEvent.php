<?php

namespace App\Events\Product;

use Illuminate\Queue\SerializesModels;

class ProductUpdateEvent
{
    use SerializesModels;

    public function __construct()
    {}
}
