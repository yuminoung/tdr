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
            $table->text('sku')->nullable();
            $table->longText('description')->nullable();
            $table->text('variant')->nullable();
            $table->string('upc')->nullable();
            $table->integer('weight')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('listings');
    }
}
