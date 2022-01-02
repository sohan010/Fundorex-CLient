<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCauseUpdatesTable extends Migration
{

    public function up()
    {
        if (Schema::hasTable('cause_updates')){
            return;
        }
        Schema::create('cause_updates', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('cause_updates');
    }
}
