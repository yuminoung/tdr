<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatchProductsTable extends Migration
{
    public function up()
    {
        Schema::create('catch_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            $table->string('category');
            $table->string('title');
            $table->string('keywords');
            $table->integer('price');
            $table->integer('discount_price')->nullable();
            $table->string('logistic_class');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('catch_products');
    }
}
