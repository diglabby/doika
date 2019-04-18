<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Config;

class CreateSettingsTable extends Migration
{
    /** @var string */
    private $tablename;
    /** @var string */
    private $keyColumn;
    /** @var string */
    private $valueColumn;

	public function __construct()
	{
		if (version_compare(Application::VERSION, '5.0', '>=')) {
			$this->tablename = Config::get('settings.table');
			$this->keyColumn = Config::get('settings.keyColumn');
			$this->valueColumn = Config::get('settings.valueColumn');
		} else {
			$this->tablename = Config::get('anlutro/l4-settings::table');
			$this->keyColumn = Config::get('anlutro/l4-settings::keyColumn');
			$this->valueColumn = Config::get('anlutro/l4-settings::valueColumn');
		}
	}

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create($this->tablename, function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->string($this->keyColumn)->index();
			$table->text($this->valueColumn);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists($this->tablename);
	}
}
