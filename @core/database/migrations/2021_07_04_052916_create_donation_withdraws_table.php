<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationWithdrawsTable extends Migration
{

    public function up()
    {
        if (Schema::hasTable('donation_withdraws')){
            return;
        }
        Schema::create('donation_withdraws', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('donation_id');
            $table->bigInteger('user_id');
            $table->string('payment_gateway');
            $table->string('withdraw_amount');
            $table->text('payment_account_details');
            $table->longText('additional_comment_by_user')->nullable();
            $table->string('transaction_id')->nullable();
            $table->longText('additional_comment_by_admin')->nullable();
            $table->string('payment_receipt')->nullable();
            $table->string('payment_status')->default('pending');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('donation_withdraws');
    }
}
