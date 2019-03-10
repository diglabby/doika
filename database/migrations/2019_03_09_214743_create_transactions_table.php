<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('payment_gateway_transaction_id')->comment('Native trsanction ID on PG');
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
