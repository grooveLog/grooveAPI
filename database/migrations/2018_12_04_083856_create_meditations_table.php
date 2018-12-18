<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeditationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meditations', function (Blueprint $table) {
            $table->increments('id');
            $table->foreign('meditation_attribution_id')->references('id')->on('meditation_attributions');
            $table->text('text')->comment('The quote');
            $table->integer('impressions')->comment('number of times a meditation has been rendered');
            $table->integer('likes')->comment('number of Groovies received');
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
        Schema::dropIfExists('meditations');
    }
}
