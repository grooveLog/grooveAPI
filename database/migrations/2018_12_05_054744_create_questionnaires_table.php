<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnaires', function (Blueprint $table) {
            $table->increments('id');
            $table->foreign('user_id')->references('id')->on('users')->comment('The user who created/contributed the questionnaire');
            $table->string('type', 32)->comment('Declare questionnaire type/format, which will determine how it is read / displayed etc');
            $table->string('title')->comment('A name/title for the questionnaire');
            $table->text('description');
            $table->text('instructions')->comment('Instructions on how to complete the questionnaire');
            $table->string('image')->comment('ID of an image asset in cloud storage');
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
        Schema::dropIfExists('questionnaires');
    }
}
