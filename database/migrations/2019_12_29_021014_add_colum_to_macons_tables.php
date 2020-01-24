<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumToMaconsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('macons', function (Blueprint $table) {
            //->after('column')
            $table->string('Telephone')->after('Nom');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('macons', function (Blueprint $table) {
            $table->dropColumn('Telephone');
        });
    }
}
