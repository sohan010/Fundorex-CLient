<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCauseLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('cause_logs')){
            Schema::create('cause_logs', function (Blueprint $table) {
                $table->id();
                $table->string('cause_id');
                $table->string('email')->nullable();
                $table->string('name')->nullable();
                $table->string('status')->nullable();
                $table->string('amount')->nullable();
                $table->string('transaction_id')->nullable();
                $table->string('payment_gateway')->nullable();
                $table->string('track')->nullable();
                $table->string('user_id')->nullable();
                $table->integer('anonymous',false,true)->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (!Schema::hasTable('cause_logs')){
            Schema::dropIfExists('cause_logs');
        }
    }
}
