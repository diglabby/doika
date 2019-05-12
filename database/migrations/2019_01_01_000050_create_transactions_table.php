<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('donator_id');
            $table->unsignedBigInteger('campaign_id');
            $table->unsignedBigInteger('subscription_id')->nullable();
            $table->string('payment_gateway');
            $table->string('payment_gateway_transaction_id')->comment('Native transaction ID on Payment Gateway');
            $table->unsignedBigInteger('amount')->comment('Amount in cents');
            $table->string('currency', 3);
            $table->string('status');
            $table->string('status_message');
            $table->timestamps();

            $table->foreign('donator_id')->references('id')->on('donators');
            $table->foreign('campaign_id')->references('id')->on('campaigns');
            $table->foreign('subscription_id')->references('id')->on('subscriptions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
