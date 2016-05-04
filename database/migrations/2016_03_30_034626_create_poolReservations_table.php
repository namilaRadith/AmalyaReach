<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoolReservationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('poolReservations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('startDate');
			$table->string('endDate');
			$table->string('eventType');
			$table->string('startTime');
			$table->string('endTime');
			$table->string('ageGroup');
			$table->string('ageRange');
			$table->integer('custId');
			$table->string('reqProgress');
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
		Schema::drop('poolReservations');
	}

}
