<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->unique();
            $table->enum('status', ['pending', 'paid', 'shipped', 'refunded']);
            $table->string('buyer');
            $table->string('platform');
            $table->string('contact');
            $table->string('company')->nullable();
            $table->string('add1');
            $table->string('add2')->nullable();
            $table->string('suburb');
            $table->string('state');
            $table->integer('postcode');
            $table->integer('shipping');
            $table->string('tracking')->nullable();
            $table->string('courier');
            $table->integer('total');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
