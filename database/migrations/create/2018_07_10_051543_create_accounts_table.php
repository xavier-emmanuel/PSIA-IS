<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('mobile');
            $table->string('age');
            $table->string('gender');
            $table->string('civil_status');
            $table->string('address');
            $table->string('place_of_birth');
            $table->string('date_of_birth');
            $table->string('username')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->string('image');
            $table->integer('verified');
            $table->string('v_code');
            $table->integer('approved');
            $table->integer('hired');
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
        Schema::dropIfExists('accounts');
    }
}
