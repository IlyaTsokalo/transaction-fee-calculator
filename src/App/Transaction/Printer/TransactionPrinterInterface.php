<?php

namespace App\Transaction\Printer;

use Exception;
use Shared\Transaction\Transfer\TransactionTransfer;

interface TransactionPrinterInterface
{
    /**
     * @param \Shared\Transaction\Transfer\TransactionTransfer $transactionTransfer
     *
     * @return void
     */
    public function printTransaction(TransactionTransfer $transactionTransfer): void;

    /**
     * @param \Exception $exception
     *
     * @return void
     */
    public function printError(Exception $exception): void;
}
