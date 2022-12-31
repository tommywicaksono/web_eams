<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEngLocToEngMstr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eng_mstr', function (Blueprint $table) {
            $table->string('eng_loc')->after('eng_role');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eng_mstr', function (Blueprint $table) {
            $table->dropColumn('eng_loc');
        });
    }
}
