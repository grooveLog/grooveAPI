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
            $table->string('description')->comment('The journalling question');
            $table->string('status', 12)->default('ACTIVE')->comment('PENDING/DONE etc.');
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
