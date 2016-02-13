<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tbl_rooms', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('type');
			$table->string('name');
			$table->string('description');
			$table->decimal('price',10,2);
			$table->decimal('discount',10,2);
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
		Schema::drop('tbl_rooms');
	}

}
