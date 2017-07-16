<?php

namespace Siqwell\DataScreen\Mappers;

use Fenix007\Wrapper\Mappers\AbstractMapper;
use Siqwell\DataScreen\Models\Transaction;

/**
 * Class Mapper
 * @package Siqwell\DataScreen\Mappers
 */
class TransactionMapper extends AbstractMapper
{
    protected $model = Transaction::class;
    protected $field = 'transaction';
}
