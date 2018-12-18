<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUniversalVisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('universal_visions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name')->comment('Name of Vision (e.g. \'Be my own boss\')');
            $table->string('privacy', 12)->comment('PUBLIC or PRIVATE (or TEAM in Future)');
            $table->boolean('endorsed')->comment('Whether endorsed by GrooveLog');
            $table->string('status', 12)->comment('ACTIVE / INACTIVE etc.');
            $table->integer('total_assignments')->comment('Counter for the number of times this vision has been used');
            $table->float('average_passion_rating')->comment('Average of all passion ratings');
            $table->timestamps();

            //foreign keys
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('universal_visions');
    }
}
