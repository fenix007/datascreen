<?php

namespace Siqwell\DataScreen\Api;

use Fenix007\Wrapper\Api\AbstractApi;

class Api extends AbstractApi
{
    protected function getSignature($requestSignAttributes) : string
    {
        return md5($requestSignAttributes . $this->client->getApiToken() . time());
    }
}
