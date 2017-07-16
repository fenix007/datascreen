<?php

namespace Siqwell\Tests\Mappers;

use Fenix007\Wrapper\Common\ObjectHydrator;
use Fenix007\Wrapper\Models\AbstractModel;

class ObjectFromDataMapper
{
    protected function hydrateToModel(string $model, array $data) : AbstractModel
    {
        return (new ObjectHydrator())->hydrate(new $model, $data);
    }
}
