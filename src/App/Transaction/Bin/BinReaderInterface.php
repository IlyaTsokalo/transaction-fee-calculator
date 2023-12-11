<?php

namespace App\Transaction\Bin;

use Shared\Transaction\Bin\Transfer\BinTransfer;
use Shared\Transaction\Transfer\TransactionTransfer;

interface BinReaderInterface
{
    /**
     * @param \Shared\Transaction\Transfer\TransactionTransfer $transactionTransfer
     *
     * @return \Shared\Transaction\Bin\Transfer\BinTransfer
     */
    public function getBin(TransactionTransfer $transactionTransfer): BinTransfer;
}
