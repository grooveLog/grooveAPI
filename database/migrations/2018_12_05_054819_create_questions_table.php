<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('questionnaire_id');
            $table->integer('version')->comment('Allows version control over questionnaires');
            $table->json('questions')->comment('Full Questionnaire in JSON Format');
            $table->string('status', 12)->comment('Status of questionnaire ACTIVE / INACTIVE etc');
            $table->integer('created_by')->comment('User ID of who committed the questionnaire update');
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
        Schema::dropIfExists('questions');
    }
}
