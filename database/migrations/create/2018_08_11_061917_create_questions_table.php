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
            $table->unsignedInteger('account_id');
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->string('dialect');
            $table->string('convicted');
            $table->string('convicted_details')->nullable();
            $table->string('health_problems');
            $table->string('health_problems_details')->nullable();
            $table->string('accident');
            $table->string('accident_details')->nullable();
            $table->string('recommend_name')->nullable();
            $table->string('relative');
            $table->string('relative_name')->nullable();
            $table->string('subsidiary_office');
            $table->string('subsidiary_office_reason')->nullable();
            $table->string('provincial_assignments');
            $table->string('preffered_office')->nullable();
            $table->string('skills');
            $table->string('skills_select');
            $table->longText('self_description');
            $table->longText('reason_of_applying');
            $table->longText('career_goals');
            $table->longText('accomplishments');
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
