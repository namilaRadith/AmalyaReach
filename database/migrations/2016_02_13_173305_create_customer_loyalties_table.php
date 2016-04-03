<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerLoyaltiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customer_loyalties', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('email');
			$table->string('password');
			$table->string('name');
			$table->string('phone');
			$table->string('street');
			$table->string('city');
			$table->string('country');
			$table->string('gender');
			$table->string('bday');
			$table->string('bmonth');
			$table->string('byear');
			$table->string('nationality');
			$table->string('children');
			$table->string('recieve_p_offers')->nullable();
			$table->string('allow_p_p_offers')->nullable();
			$table->string('type');
			$table->string('approved');
			$table->timestamp('requested_date')->nullable();
			$table->timestamp('approved_date')->nullable();
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
		Schema::drop('customer_loyalties');
	}

}
