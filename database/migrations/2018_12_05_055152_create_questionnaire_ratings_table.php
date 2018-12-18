<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionnaireRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnaire_ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('questionnaire_id')->references('id')->on('questionnaires');
            $table->foreign('questions_id')->references('id')->on('questions');
            $table->integer('rating')->comment('e.g. rating on a scale of 1 to 5 (e.g. stars)');
            $table->text('comment')->comment('User comment');
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
        Schema::dropIfExists('questionnaire_ratings');
    }
}
