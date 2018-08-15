<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('account_id');
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->string('provincial_address');
            $table->string('phone_number')->nullable();
            $table->string('place_of_birth');
            $table->string('religion');
            $table->integer('height');
            $table->integer('weight');
            $table->integer('sss_number');
            $table->integer('tin_number');
            $table->integer('philhealth_number');
            $table->integer('license_number');
            $table->string('date_issued');
            $table->string('expiration_date');
            $table->string('father_name');
            $table->string('father_birth_date');
            $table->string('father_occupation');
            $table->string('mother_name');
            $table->string('mother_birth_date');
            $table->string('mother_occupation');
            $table->string('siblings_name_1')->nullable();
            $table->string('siblings_birth_date_1')->nullable();
            $table->string('siblings_occupation_1')->nullable();
            $table->string('siblings_name_2')->nullable();
            $table->string('siblings_birth_date_2')->nullable();
            $table->string('siblings_occupation_2')->nullable();
            $table->string('siblings_name_3')->nullable();
            $table->string('siblings_birth_date_3')->nullable();
            $table->string('siblings_occupation_3')->nullable();
            $table->string('spouse_name')->nullable();
            $table->string('spouse_birth_date')->nullable();
            $table->string('spouse_occupation')->nullable();
            $table->string('spouse_dependent')->nullable();
            $table->string('child_name_1')->nullable();
            $table->string('child_birth_date_1')->nullable();
            $table->string('child_occupation_1')->nullable();
            $table->string('child_name_2')->nullable();
            $table->string('child_birth_date_2')->nullable();
            $table->string('child_occupation_2')->nullable();
            $table->string('child_name_3')->nullable();
            $table->string('child_birth_date_3')->nullable();
            $table->string('child_occupation_3')->nullable();
            $table->string('contact_name');
            $table->string('contact_relation');
            $table->string('contact_number');
            $table->string('contact_address');
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
        Schema::dropIfExists('personal_infos');
    }
}
