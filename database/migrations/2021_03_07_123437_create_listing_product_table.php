<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingProductTable extends Migration
{
    public function up()
    {
        Schema::create('listing_product', function (Blueprint $table) {
            $table->foreignId('listing_id');
            $table->foreignId('product_id');
            $table->primary(['listing_id', 'product_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('listing_product');
    }
}
