<?php

namespace App\Transaction\Currency;

use Shared\Transaction\Transfer\TransactionTransfer;

interface CurrencyRateProviderInterface
{
    /**
     * @param \Shared\Transaction\Transfer\TransactionTransfer $transactionTransfer
     *
     * @return \Shared\Transaction\Transfer\TransactionTransfer
     */
    public function getCurrencyRate(TransactionTransfer $transactionTransfer): TransactionTransfer;
}
