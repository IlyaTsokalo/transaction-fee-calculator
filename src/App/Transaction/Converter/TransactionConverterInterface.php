<?php

namespace App\Transaction\Converter;

use Shared\Transaction\Transfer\TransactionTransfer;

interface TransactionConverterInterface
{
    /**
     * @param string $inputFileName
     *
     * @return array
     */
    public function convertTransactionTextToTransactions(string $inputFileName): array;

    /**
     * @param \Shared\Transaction\Transfer\TransactionTransfer $transactionTransfer
     *
     * @return \Shared\Transaction\Transfer\TransactionTransfer
     */
    public function convertTransactionAmountToFinalCurrency(TransactionTransfer $transactionTransfer): TransactionTransfer;
}
