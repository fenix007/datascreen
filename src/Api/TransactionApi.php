<?php

namespace Siqwell\DataScreen\Api;

use Fenix007\Wrapper\HttpClient\Request;
use Siqwell\DataScreen\Methods;
use Siqwell\DataScreen\Models\Transaction;

class TransactionApi extends Api
{
    public function update(Transaction $transaction, array $options = []) : array
    {
        $parameters = array_merge(
            [$transaction],
            $options
        );

        $result = $this->get(
            Request::createFromMethod(Methods::TRANSACTION_UPDATE, $parameters)
            ->addTimestamp()
            ->addSignature($transaction->internal_id)
        );

        return $result;
    }
}
