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
                $table->string('user_id');
                $table->integer('universal_vision_id')->unsigned();
                $table->integer('vision_timescales_id')->unsigned();
                $table->string('personal_description')->nullable()->comment('The personal implementation of the universal vision, how I will do it');
                $table->integer('probability')->default(5)->comment('probability of achieving the vision e.g. 75%');
                $table->integer('passion')->default(5)->comment('personal passion for the vision (stars) e.g. 05 10 15 20 25 30 35 40 45 50');
                $table->string('status', 12)->default('ACTIVE')->comment('e.g. COMPLETED, ABANDONED, POSTPONED etc');
                $table->dateTime('completed_at')->nullable()->comment('When completed');
                $table->timestamps();

                //foreign keys
                $table->foreign('user_id')->references('id')->on('users');
                $table->foreign('universal_vision_id')->references('id')->on('universal_visions');
                $table->foreign('vision_timescales_id')->references('id')->on('vision_timescales');
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
