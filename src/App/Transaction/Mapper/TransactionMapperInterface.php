<?php

namespace App\Transaction\Mapper;

interface TransactionMapperInterface
{
    /**
     * @param array $transactions
     *
     * @return array
     */
    public function mapTransactionsToTransactionTransfers(array $transactions): array;
}
