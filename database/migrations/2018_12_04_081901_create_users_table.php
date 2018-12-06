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
            $table->string('auth_id')->unique();
            $table->string('authentication_method');
            $table->string('email');
            $table->string('username');
            $table->string('firstname');
            $table->string('lastname');
            $table->date('birthday');
            $table->string('gender');
            $table->text('personal_summary');
            $table->string('locale');
            $table->string('status', 12);
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
