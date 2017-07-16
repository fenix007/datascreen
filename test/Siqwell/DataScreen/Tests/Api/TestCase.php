<?php

namespace Siqwell\DataScreen\Tests\Api;

use Fenix007\Wrapper\Common\ObjectHydrator;
use Fenix007\Wrapper\Models\AbstractModel;
use Illuminate\Support\Arr;

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

    protected function jsonToModel(string $model, $data) : AbstractModel
    {
        if (Arr::isAssoc($data)) {
            return $this->hydrateToModel($model, $data);
        }

        return array_map(function($el) use ($model) {return $this->hydrateToModel($model, $el);}, $data);
    }

    protected function hydrateToModel(string $model, $data)
    {
        return (new ObjectHydrator())->hydrate(new $model, $data);
    }
}
