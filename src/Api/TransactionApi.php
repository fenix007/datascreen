<?php

namespace Siqwell\DataScreen\Api;

use Fenix007\Wrapper\Api\AbstractApi;
use Fenix007\Wrapper\HttpClient\Request;
use Siqwell\DataScreen\Methods;
use Siqwell\DataScreen\Models\Transaction;
use Siqwell\Eagle\Mappers\TranslationMapper;

class TransactionApi extends AbstractApi
{
    public function update(Transaction $transaction, array $options = []) : ?Transaction
    {
        $parameters = array_merge(
            [$transaction],
            $options
        );

        $result = $this->get(
            Request::createFromMethod(Methods::TRANSACTION_UPDATE, $parameters),
            TranslationMapper::class
        );

        return $result;
    }
}
