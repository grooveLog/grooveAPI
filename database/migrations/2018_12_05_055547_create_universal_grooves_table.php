<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUniversalGroovesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('universal_grooves', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->comment('ID of user who submitted the goal');
            $table->string('name')->comment('Name of Groove (e.g. \'Running\' or \'Practice Scales\' or \'Fasting\')');
            $table->string('privacy')->default('PUBLIC')->comment('PUBLIC or PRIVATE (or TEAM in Future)');
            $table->boolean('endorsed')->default(0)->comment('Whether endorsd by GrooveLog');
            $table->string('status', 12)->default('ACTIVE')->comment('ACTIVE / INACTIVE etc.');
            $table->integer('total_assignments')->default(0)->comment('Counter for the number of times this groove has been used');
            $table->float('average_commitment_rating')->default(0)->comment('Average of all commitment ratings');
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
        Schema::dropIfExists('universal_grooves');
    }
}
