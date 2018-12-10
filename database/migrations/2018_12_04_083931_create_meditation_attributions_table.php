<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeditationAttributionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meditation_attributions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique()->comment('name of the person e.g.\'Friedrich Nietzsche\'');
            $table->string('image')->comment('	ID of an image asset in cloud storage');
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
        Schema::dropIfExists('meditation_attributions');
    }
}
