<?php

namespace App\Transaction\Mapper;

use Shared\Transaction\Transfer\TransactionTransfer;

class TransactionMapper implements TransactionMapperInterface
{
    /**
     * @param array $transactions
     *
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     * @return array
     */
    public function mapTransactionsToTransactionTransfers(array $transactions): array
    {
        $transactionTransfers = [];

        if ($transactions === []) {
            return $transactionTransfers;
        }

        foreach ($transactions as $transaction) {
            $transactionTransfers[] = new TransactionTransfer($transaction);
        }

        return $transactionTransfers;
    }
}
