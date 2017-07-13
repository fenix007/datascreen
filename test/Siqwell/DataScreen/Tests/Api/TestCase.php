<?php

namespace Siqwell\DataScreen\Tests\Api;

use Siqwell\DataScreen\ApiToken;
use Siqwell\DataScreen\Methods;
use Siqwell\DataScreen\Tests\HttpClient\HttpClient;

class TestCase extends \Siqwell\DataScreen\Tests\TestCase
{
    use FileHttpTrait;

    /** @var  \Siqwell\DataScreen\Tests\Api\Api */
    private $api;

    /**
     * TestCase constructor.
     */
    public function __construct()
    {
        $this->api = new Api(new HttpClient(new ApiToken()), new Methods());
    }

    /**
     * @param string|\Closure $mapper
     *
     * @return \Siqwell\DataScreen\Tests\Api\Api
     */
    public function setMapper($mapper)
    {
        return $this->api->setMapper($mapper);
    }

    public function setFakeApiClient()
    {
        $this->api->setClient(new HttpClient(new ApiToken()), new Methods());
    }

    public function setRealApiClient()
    {
        $this->api->setClient(new \Siqwell\DataScreen\HttpClient\HttpClient(new ApiToken()), new Methods());
    }

    protected function getUrlWithoutQuery($url)
    {
        $urlParts = explode('?', $url);

        return $urlParts[0];
    }
}
