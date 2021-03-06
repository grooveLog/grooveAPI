<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->integer('questionnaire_id')->unsigned();
            $table->integer('questions_id')->unsigned();
            $table->json('answers')->nullable()->comment('Answers in JSON format');
            $table->dateTime('started_at')->nullable()->comment('When questionnaire was started');
            $table->dateTime('submitted_at')->nullable()->comment('When answers were submitted');
            $table->string('status', 12)->default('PENDING')->comment('Status - e.g. IN PROGRESS, COMPLETED');
            $table->timestamps();

            //foreign keys
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('questionnaire_id')->references('id')->on('questionnaires');
            $table->foreign('questions_id')->references('id')->on('questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
