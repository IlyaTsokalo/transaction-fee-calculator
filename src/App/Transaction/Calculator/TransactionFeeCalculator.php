<?php

namespace App\Transaction\Calculator;


use Shared\Transaction\Transfer\TransactionTransfer;

class TransactionFeeCalculator implements TransactionFeeCalculatorInterface
{
    /**
     * @param \Shared\Transaction\Transfer\TransactionTransfer $transactionTransfer
     *
     * @return \Shared\Transaction\Transfer\TransactionTransfer
     */
    public function calculate(TransactionTransfer $transactionTransfer): TransactionTransfer
    {
        $transactionTransfer->transactionFee = $this->calculateTransactionFee($transactionTransfer);

        return $transactionTransfer;
    }


    /**
     * @param \Shared\Transaction\Transfer\TransactionTransfer $transactionTransfer
     *
     * @return float
     */
    protected function calculateTransactionFee(TransactionTransfer $transactionTransfer): float
    {
        $transactionFee = $transactionTransfer->amount * $transactionTransfer->countryFeeRate;

        return round($transactionFee, 2);
    }
}
