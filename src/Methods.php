<?php

namespace Siqwell\DataScreen;

/**
 * Class Methods
 * @package Siqwell\DataScreen
 */
class Methods
{
    const TRANSACTION_UPDATE = ['method' => 'POST', 'path' => '/api/transactions'];
    const TRANSACTION_BULK_CREATE = ['method' => 'POST', 'path' => '/api/transactions/bulk'];
}
