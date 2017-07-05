<?php

namespace Siqwell\DataScreen\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class DataScreen
 * @package Siqwell\DataScreen\Facades
 */
class DataScreen extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \Siqwell\DataScreen\Client::class;
    }
}
