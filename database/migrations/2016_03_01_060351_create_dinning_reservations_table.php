<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDinningReservationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dinning_reservations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->string('firstName');
			$table->string('lastName');
			$table->string('email');
			$table->integer('phone');
			$table->string('resLocation');
			$table->string('bookingDate');
			$table->string('bookingTime');
			$table->integer('noOfAdults');
			$table->integer('noOfChildren');
			$table->string('additionalInformation');
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
		Schema::drop('dinning_reservations');
	}

}
