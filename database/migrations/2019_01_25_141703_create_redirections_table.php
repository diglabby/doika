<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRedirectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('redirections', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('source', 191)->unique();
			$table->boolean('active')->default(1);
			$table->string('target', 191);
			$table->string('type', 191);
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
		Schema::drop('redirections');
	}

}
