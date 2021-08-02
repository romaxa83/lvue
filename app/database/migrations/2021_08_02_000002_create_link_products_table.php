<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinkProductsTable extends Migration
{
    public function up(): void
    {
        Schema::create('link_products', function (Blueprint $table) {
            $table->unsignedBigInteger('link_id')->unique();
            $table->foreign('link_id')
                ->references('id')
                ->on('links')
                ->onDelete('cascade');

            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');

            $table->primary(['link_id', 'product_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('link_products');
    }
}
