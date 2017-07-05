<?php

namespace Siqwell\DataScreen;

use Siqwell\DataScreen\Api\AlbumApi;
use Siqwell\DataScreen\Api\RecordApi;
use Siqwell\DataScreen\Api\TranslationApi;
use Siqwell\DataScreen\HttpClient\HttpClient;
use Siqwell\DataScreen\Api\FilterApi;

/**
 * Class Client
 * @package Siqwell\DataScreen
 */
class Client
{
    /**
     * @var \Siqwell\DataScreen\HttpClient\HttpClient
     */
    protected $client;
    /**
     * @var \Siqwell\DataScreen\ApiToken
     */
    protected $apiToken;

    /**
     * Client constructor.
     * @param \Siqwell\DataScreen\ApiToken $apiToken
     * @param array                   $options
     */
    public function __construct(ApiToken $apiToken, array $options = [])
    {
        $this->client = new HttpClient($apiToken, $options);
    }

    /**
     * @return AlbumApi
     */
    public function Album() : AlbumApi
    {
        return new AlbumApi($this->client, new Methods());
    }

    /**
     * @return FilterApi
     */
    public function Filter() : FilterApi
    {
        return new FilterApi($this->client, new Methods());
    }

    /**
     * @return RecordApi
     */
    public function Record() : RecordApi
    {
        return new RecordApi($this->client, new Methods());
    }

    /**
     * @return TranslationApi
     */
    public function Translation() : TranslationApi
    {
        return new TranslationApi($this->client, new Methods());
    }
}
