<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{

    public function up()
    {
        if (Schema::hasTable('comments')){
            return;
        }
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cause_id');
            $table->bigInteger('user_id');
            $table->string('commented_by');
            $table->text('comment_content');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
