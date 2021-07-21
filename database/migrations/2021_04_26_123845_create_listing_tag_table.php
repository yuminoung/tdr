<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingTagTable extends Migration
{
    public function up()
    {
        Schema::create('listing_tag', function (Blueprint $table) {
            $table->foreignId('listing_id');
            $table->foreignId('tag_id');
            $table->primary(['listing_id', 'tag_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('listing_tag');
    }
}
