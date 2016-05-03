<?php
/**
 * Created by PhpStorm.
 * User: DeAlwis
 * Date: 4/3/2016
 * Time: 11:14 PM
 */

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
class TrackingServiceProvider  extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Register 'underlyingclass' instance container to our UnderlyingClass object
        $this->app['TrackingAnalytics'] = $this->app->share(function($app)
        {
            return new \App\TrackingAnalytics;
        });

        // Shortcut so developers don't need to add an Alias in app/config/app.php
        $this->app->booting(function()
        {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('Tracking', '\App\Facades\TrackingFacade');
        });
    }
}