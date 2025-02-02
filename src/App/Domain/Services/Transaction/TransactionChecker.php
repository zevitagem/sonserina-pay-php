<?php

declare(strict_types=1);

namespace App\Domain\Services\Transaction;

use App\Domain\Entities\Transaction;
use App\Domain\Services\FraudChecker;
use App\Domain\Contracts\TransactionProcessorInterface;

class TransactionChecker implements TransactionProcessorInterface
{

    /**
     * @var FraudChecker
     */
    private FraudChecker $fraudChecker;

    /**
     * @param FraudChecker $fraudChecker
     */
    public function __construct(FraudChecker $fraudChecker)
    {
        $this->fraudChecker = $fraudChecker;
    }

    /**
     * @param Transaction $transaction
     * @param type $complement
     * @return void
     * @throws \Exception
     */
    public function process(Transaction $transaction, $complement = null): void
    {
        if (!$this->fraudChecker->check($transaction)) {
            throw new \Exception('Failure of fraud verification rules.');
        }
    }

}
