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
            $table->string('user_id')->comment('The ID of user who assigning the universal groove');
            $table->integer('universal_groove_id')->unsigned();
            $table->string('privacy', 12)->default('PUBLIC')->comment('PUBLIC or PRIVATE (or TEAM in Future)');
            $table->string('personal_description')->nullable()->comment('The personal implementation of the universal groove, how I will do it');
            $table->integer('commitment')->default(5)->comment('personal commitment - e.g. 75%');
            $table->integer('volume_amount')->nullable()->comment('Optional, relates to volume_measurement e.g. 20 mins or 10 reps');
            $table->string('volume_measurement', 12)->nullable()->comment('Optional, relates to volume_amount - mins or reps');
            $table->string('frequency_prefix', 12)->nullable()->comment('frequency_prefix');
            $table->integer('frequency_number')->nullable()->comment('number of times performed (e.g. \'once\' per week / \'twice\' per week\')');
            $table->string('frequency_period', 16)->nullable()->comment('e.g. \'per week\', \'per day\', or \'per month\'');
            $table->string('status', 12)->default('ACTIVE')->comment('e.g. ACTIVE / PAUSED etc');
            $table->timestamps();

            //foreign keys
            $table->foreign('user_id')->references('id')->on('users')->comment('The ID of user who assigning the universal groove');
            $table->foreign('universal_groove_id')->references('id')->on('universal_grooves');
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
