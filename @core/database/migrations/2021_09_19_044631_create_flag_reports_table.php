<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlagReportsTable extends Migration
{

    public function up()
    {
        Schema::create('flag_reports', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cause_id')->unsigned();
            $table->string('name');
            $table->string('email');
            $table->text('subject');
            $table->longText('description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('flag_reports');
    }
}
