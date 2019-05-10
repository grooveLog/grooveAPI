<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavouritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favourites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->required()->comment('User ID');
            $table->string('type', 12)->required()->comment('Favourite type e.g. JOURNAL');
            $table->integer('entity_id')->required()->comment('id of the entity e.g. journal_question_id');
            $table->timestamps();

            $table->index(['user_id', 'type', 'entity_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favourites');
    }
}
