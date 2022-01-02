<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnToCausesTable extends Migration
{

    public function up()
    {
        Schema::table('causes', function (Blueprint $table) {
            $table->string('medical_document')->nullable();
        });
    }

    public function down()
    {
        Schema::table('causes', function (Blueprint $table) {
            $table->dropColumn('medical_document');
        });
    }
}
