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
            $table->string('category');
            $table->string('subtitle');
            $table->text('inbox');
            $table->integer('rrp');
            $table->integer('stock');
            $table->integer('price');
            $table->integer('shipping');
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
