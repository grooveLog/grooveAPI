<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisionTimescalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vision_timescales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text');
            $table->integer('numeric')->nullable()->comment('numeric representation of the text, e.g. how far in the future is the vision');
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
        Schema::dropIfExists('vision_timescales');
    }
}
