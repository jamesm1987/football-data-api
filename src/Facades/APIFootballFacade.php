<?php
/**
 * Created by PhpStorm.
 * User: jamesm
 * Date: 6/26/19
 * Time: 4:07 PM
 */

namespace jamesm\APIfootball\Facades;


use Illuminate\Support\Facades\Facade;

class APIFootballFacade extends Facade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'football'; }
}
