<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_internal_category')->nullable();
            $table->string('product_catch_category')->nullable();
            $table->string('product_kogan_category')->nullable();
            $table->string('product_ebay_category')->nullable();
            $table->string('product_amazon_category')->nullable();
            $table->string('product_sku');
            $table->string('product_upc');
            $table->string('product_title');
            $table->text('product_description');
            $table->string('product_brand');
            $table->string('product_keywords');
            $table->text('product_images');
            $table->integer('product_price');
            $table->integer('product_quantity');
            $table->integer('product_discount_price');
            $table->string('product_logistic_class');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
