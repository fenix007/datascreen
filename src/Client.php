<?php

namespace Siqwell\DataScreen;

use Siqwell\DataScreen\Api\TransactionApi;

/**
 * Class Client
 * @package Siqwell\DataScreen
 */
class Client extends \Fenix007\Wrapper\Client
{
    /**
     * @return TransactionApi
     */
    public function Translation() : TransactionApi
    {
        return new TransactionApi($this->client, new Methods());
    }
}
