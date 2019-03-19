<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('campaign_id');
            $table->string('locale', 2);
            $table->string('name');
            $table->text('description');
            $table->longText('terms_of_use')->comment('HTML text');
            $table->timestamps();

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
        Schema::dropIfExists('campaign_translations');
    }
}
