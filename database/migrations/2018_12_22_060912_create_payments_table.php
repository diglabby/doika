<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('payment_gateway_id');
            $table->integer('payment_gateway_transaction_id');
            $table->integer('campaign_id');
            $table->foreign('campaign_id')->references('id')->on('campaigns');
            $table->integer('subscription_id')->nullable();
            $table->string('error_code')->nullable();
            $table->string('error_message')->nullable();
            $table->integer('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
