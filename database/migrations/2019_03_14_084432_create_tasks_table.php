<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->comment('The ID of user who created the task');
            $table->string('description')->comment('The task');
            $table->string('urgency', 16)->default('ACTIVE')->comment('TODAY/NXT_FEW_DAYS/UPCOMING/BACKBURNER');
            $table->string('category', 16)->default('ACTIVE')->comment('HOME/WORK/PERSONAL/');
            $table->string('privacy', 12)->default('PUBLIC')->comment('PUBLIC or PRIVATE (or TEAM in Future)');
            $table->string('status', 12)->default('ACTIVE')->comment('PENDING/DONE etc.');
            $table->string('size', 2)->default('M')->comment('XS/S/M/L/XL etc.');
            $table->integer('progress')->default(0)->comment('task progress, how close to achievement e.g. 50%%');
            $table->integer('time_remaining')->nullable()->comment('Estimated minutes required to complete - convert to HH MM in UI');
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
        Schema::dropIfExists('tasks');
    }
}
