<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialOffersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('special_offers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('offer_code');
			$table->string('description');
			$table->string('total_price');
			$table->string('discount');
			$table->string('net_price');
			$table->string('created_by')->nullable();
			$table->timestamp('created_date')->nullable();
			$table->string('updated_by')->nullable();
			$table->timestamp('updated_date')->nullable();
			$table->string('flag')->nullable();
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
		Schema::drop('special_offers');
	}

}
