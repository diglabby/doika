<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_configurations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('campaign_id')->unsigned()->unique();
            $table->foreign('campaign_id')->references('id')->on('campaigns');
            $table->string('photo');
            $table->double('required_amount');
            $table->boolean('campaign_progress_bar');
            $table->timestamp('time_start');
            $table->timestamp('time_end');
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
        Schema::dropIfExists('campaign_configurations');
    }
}
