<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmploymentRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employment_records', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('account_id');
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->string('company_name_1')->nullable();
            $table->string('period_of_emlployment_from_1')->nullable();
            $table->string('period_of_emlployment_to_1')->nullable();
            $table->string('company_address_1')->nullable();
            $table->string('work_position_1')->nullable();
            $table->string('superior_name_1')->nullable();
            $table->string('nature_of_job_1')->nullable();
            $table->string('starting_salary_1')->nullable();
            $table->string('salary_upon_leaving_1')->nullable();
            $table->string('reason_of_leaving_1')->nullable();
            $table->string('company_name_2')->nullable();
            $table->string('period_of_emlployment_from_2')->nullable();
            $table->string('period_of_emlployment_to_2')->nullable();
            $table->string('company_address_2')->nullable();
            $table->string('work_position_2')->nullable();
            $table->string('superior_name_2')->nullable();
            $table->string('nature_of_job_2')->nullable();
            $table->string('starting_salary_2')->nullable();
            $table->string('salary_upon_leaving_2')->nullable();
            $table->string('reason_of_leaving_2')->nullable();
            $table->string('company_name_3')->nullable();
            $table->string('period_of_emlployment_from_3')->nullable();
            $table->string('period_of_emlployment_to_3')->nullable();
            $table->string('company_address_3')->nullable();
            $table->string('work_position_3')->nullable();
            $table->string('superior_name_3')->nullable();
            $table->string('nature_of_job_3')->nullable();
            $table->string('starting_salary_3')->nullable();
            $table->string('salary_upon_leaving_3')->nullable();
            $table->string('reason_of_leaving_3')->nullable();
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
        Schema::dropIfExists('employment_records');
    }
}
