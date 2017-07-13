<?php

namespace Siqwell\DataScreen\Mappers;

use Siqwell\DataScreen\Common\ObjectHydrator;
use Siqwell\DataScreen\Models\Transaction;

/**
 * Class Mapper
 * @package Siqwell\DataScreen\Mappers
 */
class TransactionMapper extends AbstractMapper
{
    public function get()
    {
        $objectHydrator = new ObjectHydrator();

        return $objectHydrator->hydrate(new Transaction(), $this->response['transaction']);
    }
}
