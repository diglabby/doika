<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description');
            $table->string('picture_url');
            $table->unsignedInteger('target_amount')->comment('Target amount in cents');
            $table->string('currency', 3);
            $table->tinyInteger('active_status');
            $table->timestamp('started_at');
            $table->timestamp('finished_at');
            $table->longText('visual_settings')->comment('Button preset, colors, etc. (as json)');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaigns');
    }
}
