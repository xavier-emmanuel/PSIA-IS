<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('account_id');
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->string('organization_name_1')->nullable();
            $table->string('organization_date_from_1')->nullable();
            $table->string('organization_date_to_1')->nullable();
            $table->string('organization_position_1')->nullable();
            $table->string('organization_name_2')->nullable();
            $table->string('organization_date_from_2')->nullable();
            $table->string('organization_date_to_2')->nullable();
            $table->string('organization_position_2')->nullable();
            $table->string('organization_name_3')->nullable();
            $table->string('organization_date_from_3')->nullable();
            $table->string('organization_date_to_3')->nullable();
            $table->string('organization_position_3')->nullable();
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
        Schema::dropIfExists('organizations');
    }
}
