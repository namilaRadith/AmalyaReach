<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingsReservationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('meetings_reservations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamp('created_at');
			$table->string('dateFrom');
			$table->string('datesFlexible');
			$table->integer('noOfGuestsRooms');
			$table->string('foodAndBev');
			$table->string('audioAndVisual');
			$table->string('locFlex');
			$table->integer('noOfGuests');
			$table->integer('noOfMeetingRooms');
			$table->string('otherDetails');
			$table->string('company');
			$table->string('likeContact');
			$table->string('resStatus');
			$table->integer('custId');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('meetings_reservations');
	}

}
