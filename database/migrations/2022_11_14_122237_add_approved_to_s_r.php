<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddApprovedToSR extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_req_mstr', function (Blueprint $table) {
            $table->string('sr_approver')->after('req_username');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_req_mstr', function (Blueprint $table) {
            $table->dropColumn('sr_approver');
        });
    }
}