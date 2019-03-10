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
            $table->unsignedInteger('donator_id');
            $table->unsignedInteger('campaign_id');
            $table->unsignedInteger('subscription_id')->nullable();
            $table->string('payment_gateway');
            $table->string('payment_gateway_transaction_id')->comment('Native trsanction ID on PG');
            $table->unsignedInteger('amount')->comment('Amount in cents');
            $table->string('currency');
            $table->string('status');
            $table->string('status_message');
            $table->timestamps();

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
