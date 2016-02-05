<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageMastersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('image_masters', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('belongspage');
			$table->string('belongssection');
			$table->string('url',1000);
			$table->string('description',5000);
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
		Schema::drop('image_masters');
	}

}
