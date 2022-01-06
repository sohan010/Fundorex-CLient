<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserVerifiesTable extends Migration
{

    public function up()
    {
        Schema::create('user_verifies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('name');
            $table->string('date_of_birth');
            $table->string('family_card_photo');
            $table->string('selfie_photo');
            $table->string('selfie_with_family_card_photo');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('user_verifies');
    }
}
