<?php

namespace Siqwell\DataScreen\Tests\Api;

use Siqwell\DataScreen\Mappers\RecordMapper;

class AbstractApiTest extends TestCase
{
    const MAPPERCLASS = RecordMapper::class;

    public function testSetMapper_ByClass()
    {
        $api = $this->setMapper(self::MAPPERCLASS);

        $this->assertEquals(RecordMapper::class, $api->getMapper());
    }

    public function testSetMapper_ByClosure()
    {
        $closure = function () {
            return 'test';
        };

        $api = $this->setMapper($closure);

        $this->assertEquals($closure, $api->getMapper());
    }
}
