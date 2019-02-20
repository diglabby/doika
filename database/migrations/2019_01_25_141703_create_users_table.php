<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('email', 191)->unique();
			$table->dateTime('email_verified_at')->nullable();
			$table->string('password', 191)->nullable();
			$table->dateTime('password_changed_at')->nullable();
			$table->boolean('active')->default(1);
			$table->string('remember_token', 100)->nullable();
			$table->string('locale', 191);
			$table->string('timezone', 191);
			$table->string('slug', 191)->unique();
			$table->string('confirmation_code')->nullable();
			$table->boolean('active')->default(0);
			$table->boolean('confirmed')->default(0);
			$table->dateTime('last_access_at')->nullable();
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
		Schema::drop('users');
	}

}
