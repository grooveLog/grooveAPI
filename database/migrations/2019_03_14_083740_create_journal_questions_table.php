<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->comment('The ID of user who has submitted the question');
            $table->string('question')->comment('The journalling question');
            $table->string('type', 12)->comment('e.g. MORNING, EVENING, GENERAL, PRIVATE (e.g. private to the user)');
            $table->boolean('endorsed')->default(0)->comment('Whether endorsed by GrooveLog');
            $table->string('status', 12)->default('ACTIVE')->comment('ACTIVE / INACTIVE etc.');
            $table->integer('number_of_appearances')->default(0)->comment('How many times this question has appeared');
            $table->integer('number_of_answers')->default(0)->comment('How many times this question has been answered');
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
        Schema::dropIfExists('journal_questions');
    }
}
