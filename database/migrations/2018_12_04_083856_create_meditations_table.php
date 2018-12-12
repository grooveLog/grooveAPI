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
            $table->text('text')->comment('The quote');
            $table->integer('meditation_attribution_id');
            $table->integer('shown_count')->comment('number of times a meditation has been rendered');
            $table->integer('groovies')->comment('number of Groovies received');
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
