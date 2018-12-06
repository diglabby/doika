<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyLangInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_lang_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->string('company_lang',100);
            $table->text('company_title_lang');
            $table->longtext('company_description_lang');
            $table->string('company_currency_lang',100);
            $table->text('required_amount_lang');
            $table->text('other_amount_lang');
            $table->string('donate_lang',20);
            $table->text('payment_title_lang');
            $table->longtext('payment_description_lang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_lang_informations');
    }
}
