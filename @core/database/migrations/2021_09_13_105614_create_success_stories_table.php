<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuccessStoriesTable extends Migration
{

    public function up()
    {
        Schema::create('success_stories', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->longText('content');
            $table->unsignedInteger('success_story_category_id');
            $table->string('image')->nullable();
            $table->string('status')->nullable();
            $table->text('excerpt')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_tags')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('og_meta_title')->nullable();
            $table->text('og_meta_description')->nullable();
            $table->string('og_meta_image')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('success_stories');
    }
}
