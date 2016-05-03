<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrackingAnalyticsTbl extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tracking_data_tbl', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('PHP_SELF')->nullable();
			$table->string('SERVER_ADDR')->nullable();
			$table->string('SERVER_NAME')->nullable();
			$table->string('SERVER_PROTOCOL')->nullable();
			$table->string('REQUEST_METHOD')->nullable();
			$table->string('REQUEST_TIME')->nullable();
			$table->string('QUERY_STRING')->nullable();
			$table->timestamp('HTTP_ACCEPT')->nullable();
			$table->string('HTTP_HOST')->nullable();
			$table->timestamp('HTTP_USER_AGENT')->nullable();
			$table->string('REMOTE_ADDR')->nullable();
			$table->string('REMOTE_HOST')->nullable();
			$table->timestamp('REQUEST_URI')->nullable();
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
		Schema::drop('tracking_data_tbl');
	}

}
