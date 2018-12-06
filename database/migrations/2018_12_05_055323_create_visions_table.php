<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('universal_vision_id');
            $table->string('personal_description')->comment('The personal implementation of the universal vision, how I will do it');
            $table->integer('probability')->comment('probability of achieving the vision e.g. 75%');
            $table->integer('passion')->comment('personal passion for the vision (stars) e.g. 05 10 15 20 25 30 35 40 45 50');
            $table->integer('vision_timescales_id');
            $table->string('status', 12)->comment('e.g. COMPLETED, ABANDONED, POSTPONED etc');
            $table->datetime('completed_at')->comment('When completed');
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
        Schema::dropIfExists('visions');
    }
}
