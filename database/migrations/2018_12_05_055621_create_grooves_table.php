<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroovesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grooves', function (Blueprint $table) {
            $table->increments('id');
            $table->foreign('user_id')->references('id')->on('users')->comment('The ID of user who assigning the universal groove');
            $table->foreign('universal_groove_id')->references('id')->on('universal_grooves');
            $table->string('personal_description')->comment('The personal implementation of the universal groove, how I will do it');
            $table->integer('commitment')->comment('personal commitment - e.g. 75%');
            $table->integer('volume_amount')->comment('Optional, relates to volume_measurement e.g. 20 mins or 10 reps');
            $table->integer('volume_measurement')->comment('Optional, relates to volume_amounnt - mins or reps');
            $table->string('frequency_prefix', 12)->comment('frequency_prefix');
            $table->integer('frequency_number')->comment('number of times performed (e.g. \'once\' per week / \'twice\' per week\')');
            $table->string('frequency_period', 16)->comment('e.g. \'per week\', \'per day\', or \'per month\'');
            $table->string('status', 12)->comment('e.g. ACTIVE / PAUSED etc');
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
        Schema::dropIfExists('grooves');
    }
}
