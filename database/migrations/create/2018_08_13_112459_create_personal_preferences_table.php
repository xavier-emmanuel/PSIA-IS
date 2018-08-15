<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_preferences', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('account_id');
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->string('preference_name_1');
            $table->string('preference_occupation_1');
            $table->string('preference_contact_1');
            $table->string('preference_name_2');
            $table->string('preference_occupation_2');
            $table->string('preference_contact_2');
            $table->string('preference_name_3');
            $table->string('preference_occupation_3');
            $table->string('preference_contact_3');
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
        Schema::dropIfExists('personal_preferences');
    }
}
