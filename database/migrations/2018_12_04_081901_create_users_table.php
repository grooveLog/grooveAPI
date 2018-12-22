<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('auth_id')->unique()->comment('hash from google');
            $table->string('authentication_method', 16)->comment('	if available from google e.g. Facebook; Email etc');
            $table->string('email');
            $table->string('username');
            $table->string('firstname');
            $table->string('lastname');
            $table->date('birthday')->nullable()->comment('Use this to get the age of the user (non-mandatory)');
            $table->string('gender', 1)->nullable()->comment('e.g. MALE M, FEMALE F - OTHER? (non-mandatory');
            $table->text('personal_summary')->nullable()->comment('user submitted description of who they are and why they\'re using grooveLog');
            $table->string('locale')->nullable();
            $table->string('image')->nullable();
            $table->string('status', 12)->default('ACTIVE')->comment('\'ACTIVE\', \'INACITVE\', \'GROOVER\' etc...');
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
        Schema::dropIfExists('users');
    }
}
