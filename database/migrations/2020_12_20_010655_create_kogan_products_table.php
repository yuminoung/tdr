<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKoganProductsTable extends Migration
{
    public function up()
    {
        Schema::create('kogan_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id');
            $table->string('sku');
            $table->string('title');
            $table->string('brand')->default('TDR');
            $table->string('category')->nullable();
            $table->integer('stock');
            $table->integer('price');
            $table->integer('shipping')->default(10);
            $table->text('images');
            $table->text('description');
            $table->string('subtitle')->nullable();
            $table->text('inbox')->nullable();
            $table->string('gtin')->nullable();
            $table->string('rrp')->nullable();
            $table->integer('handling_day')->default(2);
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
        Schema::dropIfExists('kogan_products');
    }
}
