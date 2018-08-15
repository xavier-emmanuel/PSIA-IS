<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGovernmentExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('government_exams', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('account_id');
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->string('examination_1')->nullable();
            $table->string('examination_date_taken_1')->nullable();
            $table->string('examination_result_1')->nullable();
            $table->string('examination_place_taken_1')->nullable();
            $table->string('examination_2')->nullable();
            $table->string('examination_date_taken_2')->nullable();
            $table->string('examination_result_2')->nullable();
            $table->string('examination_place_taken_2')->nullable();
            $table->string('examination_3')->nullable();
            $table->string('examination_date_taken_3')->nullable();
            $table->string('examination_result_3')->nullable();
            $table->string('examination_place_taken_3')->nullable();
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
        Schema::dropIfExists('government_exams');
    }
}
