<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColumnsToAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accounts', function ($table) {
            $table->string('interview_title')->nullable()->after('hired');
            $table->string('interview_message')->nullable()->after('interview_title');
            $table->string('date_of_interview')->nullable()->after('interview_message');
            $table->timestamp('date_hired')->nullable()->after('date_of_interview');
            $table->timestamp('date_approved')->nullable()->after('date_hired');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
