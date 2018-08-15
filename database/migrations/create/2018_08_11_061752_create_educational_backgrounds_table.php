<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationalBackgroundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educational_backgrounds', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('account_id');
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->string('elementary_school');
            $table->string('elementary_award')->nullable();
            $table->string('elementary_year');
            $table->string('elementary_address');
            $table->string('highschool_school');
            $table->string('highschool_award')->nullable();
            $table->string('highschool_year');
            $table->string('highschool_address');
            $table->string('college_school');
            $table->string('college_award')->nullable();
            $table->string('college_year');
            $table->string('college_address');
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
        Schema::dropIfExists('educational_backgrounds');
    }
}
