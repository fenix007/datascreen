<?php

namespace Siqwell\DataScreen\Tests\Api;

use Siqwell\DataScreen\Api\TransactionApi;
use Siqwell\DataScreen\Mappers\TransactionMapper;
use Siqwell\DataScreen\Methods;
use Siqwell\DataScreen\Models\Transaction;

class TransactionApiTest extends TestCase
{
    const TRANSACTION_ID = 777777;
    const TRANSACTION_NOT_EXIST_ID = 'not_exist';

    /** @var  TransactionApi */
    private $transactionApi;

    protected function setUp()
    {
        parent::setUp();
        
        $this->transactionApi = new TransactionApi($this->createRealHttpClient());
    }
    
    protected function tearDown()
    {
        unset($this->transactionApi);
        
        parent::tearDown();
    }
    
    public function testUpdate()
    {
        $request = $this->createRequestFromFile(
                Methods::TRANSACTION_UPDATE['path'],
                Methods::TRANSACTION_UPDATE['method'],
                ['id' => self::TRANSACTION_ID]
            );

        $res = $request->setMapper(TransactionMapper::class)->callMap($request);

        $transaction = $this->transactionApi->update(self::TRANSACTION_ID, $request);

        $this->assertInstanceOf(Transaction::class, $transaction);
    }
}
