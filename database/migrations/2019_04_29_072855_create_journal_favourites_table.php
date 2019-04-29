<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJournalFavouritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal_favourites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->unique()->comment('The ID of user who is favouriting journal questions');
            $table->json('list')->nullable()->comment('Json list of favourite ids e.g. journal_question_id date_added');
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
        Schema::dropIfExists('journal_favourites');
    }
}
