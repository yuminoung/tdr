<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopifyListingsTable extends Migration
{
    public function up()
    {
        Schema::create('shopify_listings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('listing_id');
            $table->string('shopify_id');
            $table->string('title');
            $table->integer('price');
            $table->integer('discount_price')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('shopify_listings');
    }
}
