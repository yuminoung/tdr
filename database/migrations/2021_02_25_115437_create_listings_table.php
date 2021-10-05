<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingsTable extends Migration
{
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->text('sku');
            $table->string('title');
            $table->longText('description');
            $table->string('category');
            $table->string('platform');
            $table->string('price');
            $table->integer('stock');
            $table->string('shipping');
            $table->text('images')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('product_inbox')->nullable();
            $table->string('gtin')->nullable();
            $table->integer('weight')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('listings');
    }
}
