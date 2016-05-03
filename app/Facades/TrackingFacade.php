<?php
/**
 * Created by PhpStorm.
 * User: DeAlwis
 * Date: 4/3/2016
 * Time: 11:18 PM
 */

namespace App\Facades;

use \Illuminate\Support\Facades\Facade;
class TrackingFacade extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
        {
            return 'TrackingAnalytics';
        }

}