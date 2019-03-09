<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('donator_id');
            $table->unsignedInteger('campaign_id');
            $table->string('payment_gateway');
            $table->string('payment_gateway_subscription_id')->comment('Native subscription ID on PG');
            $table->unsignedInteger('amount')->comment('Amount in cents');
            $table->string('currency');
            $table->string('payment_period')->comment('"1 month", "1 week", etc');
            $table->timestamps();

            $table->foreign('donator_id')->references('id')->on('donators');
            $table->foreign('campaign_id')->references('id')->on('campaigns');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}
