<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUniversalGoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('universal_goals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('ID of user who submitted the goal');
            $table->string('name')->comment('Name of Goal (e.g. \'Run a 5k race\' )');
            $table->string('privacy', 12)->comment('PUBLIC or PRIVATE (or TEAM in Future)');
            $table->boolean('endorsed')->comment('Whether endorsd by GrooveLog');
            $table->string('status', 12)->comment('ACTIVE / INACTIVE etc.');
            $table->integer('total_assignments')->comment('Counter for the number of times this goal has been used');
            $table->float('average_reward_rating')->comment('Average of all reward ratings');
            $table->timestamps();

            //foreign keys
            $table->foreign('user_id')->references('id')->on('users')->comment('ID of user who submitted the goal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('universal_goals');
    }
}
