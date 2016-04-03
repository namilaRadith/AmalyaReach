<?php namespace App\Providers;


use App\Facades\QuestionerFacade;

use App\Questioner;
use Illuminate\Support\ServiceProvider;

class QuestionerServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('questionerFacade', function(){
			return new Questioner();
		});
	}

}
