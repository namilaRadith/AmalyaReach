<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreColumns extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->string('title');
			$table->string('last_name');
			$table->string('address');
			$table->string('country');
			$table->string('phone');


		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->dropColumn('title');
			$table->dropColumn('last_name');
			$table->dropColumn('address');
			$table->dropColumn('country');
			$table->dropColumn('phone');
		});
	}

}
