<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmmergencyToCausesTable extends Migration
{

    public function up()
    {
        Schema::table('causes', function (Blueprint $table) {
            $table->string('emmergency')->nullable();
        });
    }

    public function down()
    {
        Schema::table('causes', function (Blueprint $table) {
            $table->dropColumn('emmergency');
        });
    }
}
