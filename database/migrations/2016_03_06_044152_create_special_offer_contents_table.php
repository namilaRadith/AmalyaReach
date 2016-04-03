<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialOfferContentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('special_offer_contents', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('offer_id');
			$table->string('ref_table_name');
			$table->string('ref_table_id');
			$table->string('total_price');
			$table->string('flag');
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
		Schema::drop('special_offer_contents');
	}

}
