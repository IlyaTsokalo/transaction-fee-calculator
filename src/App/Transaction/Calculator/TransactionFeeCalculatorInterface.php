<?php

namespace App\Transaction\Calculator;

use Shared\Transaction\Transfer\TransactionTransfer;

interface TransactionFeeCalculatorInterface
{
    /**
     * @param \Shared\Transaction\Transfer\TransactionTransfer $transactionTransfer
     *
     * @return \Shared\Transaction\Transfer\TransactionTransfer
     */
    public function calculate(TransactionTransfer $transactionTransfer): TransactionTransfer;
}
