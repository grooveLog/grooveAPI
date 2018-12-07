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
            $table->integer('user_id');
            $table->integer('questionnaire_id');
            $table->integer('questions_id');
            $table->json('answers')->comment('Answers in JSON format');
            $table->dateTime('started_at')->comment('When questionnaire was started');
            $table->dateTime('submitted_at')->comment('When answers were submitted');
            $table->string('status', 12)->comment('Status - e.g. IN PROGRESS, COMPLETED');
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
        Schema::dropIfExists('answers');
    }
}
