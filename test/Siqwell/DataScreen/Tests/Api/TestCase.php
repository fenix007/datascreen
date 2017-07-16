<?php

namespace Siqwell\DataScreen\Tests\Api;

class TestCase extends \Fenix007\Wrapper\Tests\Api\TestCase
{
    const DYNAMIC_FIELDS = [
        'current_screenshot',
        'current_screenshot_small',
        'screenshot',
        'screenshot_small',
        'view_count',
        'updated_at'
    ];

    protected $rootDir = ROOT_DIR;
    protected $resourceDir = RESOURCES_DIR;
}
