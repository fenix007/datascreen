<?php

namespace Siqwell\DataScreen\Tests\Api;

use Siqwell\DataScreen\ApiToken;
use Siqwell\DataScreen\Methods;
use Siqwell\DataScreen\Tests\HttpClient\HttpClient;
use Siqwell\DataScreen\HttpClient\Request;

class TestCase extends \Siqwell\DataScreen\Tests\TestCase
{
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
     * Get the expected request that will deliver a response
     *
     * @param $path
     * @param  array   $parameters
     * @param  string  $method
     * @return \Siqwell\DataScreen\HttpClient\Request
     */
    protected function getRequest($path, $method = 'GET', array $parameters = []) : Request
    {
        $request = new Request(
            $path,
            $method,
            $parameters
        );

        return $request;
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

    public function getResponseDataFromFile($method, $parameters = [])
    {
        $config = $this->createFakeConfig();
        $path =  $config['base_uri'] . '/' . $method;

        foreach ($parameters as $var => $val) {
            $path = str_replace('{' . $var . '}', $val, $path);
        }

        if (!file_exists($path)) {
            throw new \RuntimeException("Resource test file '$path' does not found");
        }

        if (!$response = @\json_decode(file_get_contents($path), true)) {
             throw new \RuntimeException("Error to decode json file '$path'");
        }

        if (!isset($response['data'])) {
            throw new \RuntimeException("Data field not found in response body file '$path'");
        }

        return $response['data'];
    }

    protected function getUrlWithoutQuery($url)
    {
        $urlParts = explode('?', $url);

        return $urlParts[0];
    }
}
