<?php
namespace Siqwell\DataScreen\HttpClient;

use Fenix007\Wrapper\HttpClient\AbstractHttpClient;

class HttpClient extends AbstractHttpClient
{
    protected function getSecurityParamsToUri(): string
    {
        return "token={$this->apiToken->getToken()}";
    }
}
