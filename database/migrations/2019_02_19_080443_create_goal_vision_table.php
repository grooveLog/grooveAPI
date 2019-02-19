<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoalVisionTable extends Migration
{
    /**
     * Run the migrations.
     * A pivot table between goals and visions
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goal_vision', function (Blueprint $table) {
            $table->integer('goal_id')->unsigned();
            $table->integer('vision_id')->unsigned();

            $table->foreign('goal_id')->references('id')->on('goals')->onDelete('cascade');
            $table->foreign('vision_id')->references('id')->on('visions')->onDelete('cascade');

            //unique constraint on goal_id an vision_id
            $table->primary(['goal_id', 'vision_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goal_vision');
    }
}
