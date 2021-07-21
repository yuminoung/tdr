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
            $table->string('order_id');
            $table->string('order_name')->nullable();
            $table->timestamp('processed_at');
            $table->text('note')->nullable();
            $table->enum('status', ['fulfilled', 'unfulfilled']);
            $table->string('customer_first_name');
            $table->string('customer_last_name');
            $table->string('platform');
            $table->string('contact');
            $table->string('email')->nullable();
            $table->string('company')->nullable();
            $table->string('add1');
            $table->string('add2')->nullable();
            $table->string('city');
            $table->string('state');
            $table->integer('postcode');
            $table->integer('shipping')->default(0);
            $table->string('tracking')->nullable();
            $table->string('courier')->nullable();
            $table->integer('total');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
