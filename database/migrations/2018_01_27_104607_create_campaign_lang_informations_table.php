<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignLangInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_lang_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('campaign_id')->unsigned();
            $table->foreign('campaign_id')->references('id')->on('campaigns');
            $table->string('campaign_lang',100);
            $table->text('campaign_title_lang');
            $table->longtext('campaign_description_lang');
            $table->string('campaign_currency_lang',100);
            $table->text('required_amount_lang');
            $table->text('other_amount_lang');
            $table->string('donate_lang',20);
            $table->text('payment_title_lang');
            $table->longtext('payment_description_lang');
            
            
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
        Schema::dropIfExists('campaign_lang_informations');
    }
}
