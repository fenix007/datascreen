<?php

namespace Siqwell\Tests\Mappers;

use Siqwell\DataScreen\Common\ObjectHydrator;
use Siqwell\DataScreen\Tests\ArrayFunctions;

class ObjectFromDataMapper
{
    use ArrayFunctions;

    /**
     * @param string $model
     * @param array $data
     * @return \Siqwell\DataScreen\Models\AbstractModel
     */
    public function get(string $model, $data)
    {
        $objectHydrator = new ObjectHydrator();

        $res =
        if (!self::isAssoc($data)) {

        }

        return $objectHydrator->hydrate(new $model, $data);
    }
}
