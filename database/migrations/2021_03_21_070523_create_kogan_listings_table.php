<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKoganListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kogan_listings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('listing_id');
            $table->string('title');
            $table->string('brand');
            $table->integer('category');
            $table->string('stock');
            $table->string('subtitle');
            $table->text('inbox');
            $table->integer('price');
            $table->integer('shipping');
            $table->integer('rrp')->nullable();
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
        Schema::dropIfExists('kogan_listings');
    }
}
