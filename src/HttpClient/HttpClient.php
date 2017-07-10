<?php

namespace Siqwell\DataScreen\HttpClient;

class HttpClient extends AbstractHttpClient
{
    protected function getSecurityParamsToUri(): string
    {
        return "token={$this->apiToken->getToken()}";
    }
}
