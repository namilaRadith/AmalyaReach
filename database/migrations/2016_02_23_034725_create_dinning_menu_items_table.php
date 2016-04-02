<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDinningMenuItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dinning_menu_items', function(Blueprint $table)
		{

			$table->increments('id');
			$table->string('itemName');
			$table->string('quantitiy');
			$table->string('foodCatagory');
			$table->double('price');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dinning_menu_items');
	}

}
