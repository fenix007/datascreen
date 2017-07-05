<?php

namespace Siqwell\DataScreen;

use Illuminate\Support\ServiceProvider;

/**
 * Class DataScreenServiceProvider
 * @package Siqwell\DataScreen
 */
class DataScreenServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            $this->defaultConfig() => config_path('datascreen.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->setupConfiguration();

        $this->app->singleton(Client::class, function () {
            $options = config('datascreen');

            // Register the client using the key and options from config
            $token = new ApiToken(config('datascreen.api_key'));

            return new Client($token, $options);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['datascreen'];
    }

    /**
     * Setup configuration
     *
     * @return  void
     */
    private function setupConfiguration()
    {
        $config = $this->defaultConfig();
        $this->mergeConfigFrom($config, 'datascreen');
    }

    /**
     * Returns the default configuration path
     *
     * @return string
     */
    private function defaultConfig()
    {
        return __DIR__ . '/config/datascreen.php';
    }
}
