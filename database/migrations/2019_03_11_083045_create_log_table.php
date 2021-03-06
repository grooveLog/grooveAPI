<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->comment('The ID of user recording to the logs');
            $table->string('type', 12)->comment('Type being logged e.g. GROOVE, MOOD, TASK, JOURNAL');
            $table->string('privacy_non_derived', 12)->nullable()->comment('PUBLIC or PRIVATE (not derived for task or groove)');
            $table->integer('groove_id')->nullable()->comment('Key to the Groove table');
            $table->integer('task_id')->nullable()->comment('Key to the Task table');
            $table->json('introspection')->nullable()->comment('For Mood Introspection');
            $table->integer('journal_question_id')->nullable()->comment('Key to journal_questions table');
            $table->date('performed_at')->nullable()->comment('date the item is performed (e.g. Grooves/Tasks only)');
            $table->string('success_type', 12)->nullable()->comment('e.g. DONE / FAIL');
            $table->string('comment')->nullable()->comment('Comment or excuse');
            $table->integer('mood_score')->nullable()->comment('e.g. 1 to 100 on mood score');
            $table->text('entry')->nullable()->comment('The journal entry');
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
        Schema::dropIfExists('logs');
    }
}
