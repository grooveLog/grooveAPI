<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyJournalQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_journal_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->date('day')->unique()->comment('yyyy-mm-dd');
            $table->integer('question_id');
            $table->string('set_by')->nullable('user id of person who set the question of the day');
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
        Schema::dropIfExists('daily_journal_questions');
    }
}
