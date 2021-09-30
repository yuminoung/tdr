<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuesTable extends Migration
{
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->id();
            $table->string('sku');
            $table->text('issue');
            $table->string('platform');
            $table->boolean('closed')->default(false);
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('issues');
    }
}
