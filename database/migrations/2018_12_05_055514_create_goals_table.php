<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->comment('The ID of user who assigning the universal goal');
            $table->integer('universal_goal_id')->unsigned();
            $table->string('personal_description')->nullable()->comment('The personal implementation of the universal goal, how I will do it');
            $table->integer('progress')->default(0)->comment('goal progress, how close to achievement e.g. 50%%');
            $table->integer('reward')->default(5)->comment('personal reward for completing the for the goal (stars) e.g. 05 10 15 20 25 30 35 40 45 50');
            $table->date('goal_date_from')->nullable()->comment('from date (optional, for between dates)');
            $table->date('goal_date_to')->nullable()->comment('to date, the final cut-off target date');
            $table->string('status', 12)->default('ACTIVE')->comment('e.g. COMPLETED, FAILED, POSTPONED etc');
            $table->dateTime('completed_at')->nullable()->comment('When completed');
            $table->timestamps();

            //foreign keys
            $table->foreign('user_id')->references('id')->on('users')->comment('The ID of user who assigning the universal goal');
            $table->foreign('universal_goal_id')->references('id')->on('universal_goals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goals');
    }
}
