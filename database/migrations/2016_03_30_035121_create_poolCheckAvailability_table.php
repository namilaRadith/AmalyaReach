<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoolCheckAvailabilityTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('poolCheckAvailability', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('dates');
			$table->string('reservationId');
			$table->timestamp('createdAt');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('poolCheckAvailability');
	}

}
