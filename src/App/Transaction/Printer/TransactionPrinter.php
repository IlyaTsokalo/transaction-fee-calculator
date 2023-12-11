<?php

namespace App\Transaction\Printer;

use Exception;
use Shared\Transaction\Transfer\TransactionTransfer;

class TransactionPrinter implements TransactionPrinterInterface
{
    /**
     * @param \Shared\Transaction\Transfer\TransactionTransfer $transactionTransfer
     *
     * @return void
     */
    public function printTransaction(TransactionTransfer $transactionTransfer): void
    {
        print $transactionTransfer->transactionFee . PHP_EOL;
    }

    /**
     * @param \Exception $exception
     *
     * @return void
     */
    public function printError(Exception $exception): void
    {
        print $exception->getMessage() . PHP_EOL;
    }
}
