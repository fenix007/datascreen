<?php

namespace Siqwell\DataScreen\HttpClient;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use Illuminate\Support\Facades\Cache;
use Kevinrob\GuzzleCache\CacheMiddleware;
use Kevinrob\GuzzleCache\Storage\LaravelCacheStorage;
use Kevinrob\GuzzleCache\Strategy\GreedyCacheStrategy;
use Phlib\Guzzle\ConvertCharset;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;
use Siqwell\DataScreen\ApiToken;

/**
 * Class HttpClient
 * @package Siqwell\DataScreen
 */
abstract class AbstractHttpClient extends Client
{
    /**
     * @var string
     */
    protected $cstore = 'file';

    /**
     * @var \Siqwell\DataScreen\ApiToken
     */
    protected $apiToken;

    protected abstract function getSecurityParamsToUri() : string;

    /**
     * HttpClient constructor.
     *
     * @param \Siqwell\DataScreen\ApiToken $apiToken
     * @param array                   $config
     */
    public function __construct(ApiToken $apiToken, array $config = [])
    {
        $this->apiToken = $apiToken;
        $stack          = HandlerStack::create();

        $stack->push($this->cacheMiddleware(), 'cache');
        $stack->push($this->charsetMiddleware(), 'charset');

        $config = array_merge([
            'handler' => $stack,
        ], $config);

        parent::__construct($config);
    }

    /**
     * @param UriInterface|string $uri
     * @param array               $options
     *
     * @return ResponseInterface
     */
    public function get($uri, array $options = [])
    {
        $uri = $this->injectAuthInfoToUri($uri);

        return parent::get($uri, $options);
    }

    private function injectAuthInfoToUri(string $uri): string
    {
        if (is_string($uri)) {
            $query = parse_url($uri, PHP_URL_QUERY);

            // Returns a string if the URL has parameters or NULL if not
            $uri .= ($query ? '&' : '?') . $this->getSecurityParamsToUri();
        }

        return $uri;
    }

    /**
     * @param int $ttl
     *
     * @return CacheMiddleware
     */
    protected function cacheMiddleware($ttl = 86400): CacheMiddleware
    {
        $store = new LaravelCacheStorage(Cache::store($this->cstore));

        return new CacheMiddleware(new GreedyCacheStrategy($store, $ttl));
    }

    /**
     * @return ConvertCharset
     */
    protected function charsetMiddleware(): ConvertCharset
    {
        return new ConvertCharset();
    }
}
