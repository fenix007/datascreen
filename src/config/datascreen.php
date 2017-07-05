<?php

return [
    /**
     * Api key
     */
    'api_key' => env('DATASCREEN_API_KEY'),
    
    'base_uri' => 'http://api.datascreen.com',

    'account' => 'siqwell',
    
    /**
     * Client options
     */
    'options' => [
        /**
         * Use https
         */
        'secure' => true,
        
        /*
         * Cache
         */
        'cache' => [
            'enabled' => true,
            // Keep the path empty or remove it entirely to default to storage/datascreen
            'path' => storage_path('datascreen')
        ],
        
        /*
         * Log
         */
        'log' => [
            'enabled' => true,
            // Keep the path empty or remove it entirely to default to storage/logs/datascreen.log
            'path' => storage_path('logs/datascreen.log')
        ]
    ],
    'headers' => [
        'Referer' => 'https://www.datascreen.ru/',
        'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36',
        'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
        'Accept-Language' => 'ru-RU,ru;q=0.8,en-US;q=0.6,en;q=0.4',
    ]
];
