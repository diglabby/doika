<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('notifications', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('purpose', 20)->comment('Describe aim of the message briefly');
          $table->string('title')->comment('For the email Subject field');
          $table->text('body')->comment('All body of the message');
          $table->boolean('regular')->default(false)->comment('Onetime pay  ment or subscription');
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
        Schema::dropIfExists('notifications');
    }
}
