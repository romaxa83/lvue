<?php

namespace Database\Seeders;

use App\Models\Product\Product;

class ProductSeeder extends BaseSeeder
{
    public function run()
    {
//                \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
//        \DB::table('products')->truncate();
//        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        if(Product::count() === 0){
            Product::factory(20)->create();
        }
    }
}
