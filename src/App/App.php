<?php

namespace App;

require dirname(__DIR__, 2) . '/vendor/autoload.php';

use App\Transaction\TransactionFacade;
use App\Transaction\TransactionFactory;
use Exception;


class App
{

    /**
     * @param string $inputFilename
     *
     * @throws \Exception
     * @return void
     */
    public function boot(string $inputFilename): void
    {
        $transactionFacade = new TransactionFacade(new TransactionFactory());

        $transactions = $transactionFacade->convertTransactionTextToTransactions($inputFilename);

        $transactionTransfers = $transactionFacade->mapTransactionsToTransactionTransfers($transactions);

        foreach ($transactionTransfers as $transactionTransfer) {
            try {
                $binTransfer = $transactionFacade->getBin($transactionTransfer);
                $transactionTransfer->countryFeeRate = $transactionFacade->getCountryFeeRate($binTransfer)->countryFeeRate;

                $transactionTransfer = $transactionFacade->getCurrencyRate($transactionTransfer);

                $transactionTransfer = $transactionFacade->convertTransactionAmountToFinalCurrency($transactionTransfer);

                $transactionTransfer = $transactionFacade->calculateTransactionFee($transactionTransfer);

                $transactionFacade->printTransaction($transactionTransfer);
            } catch (Exception $exception) {
                $transactionFacade->printError($exception);
            }
        }
    }
}

(new App())->boot($argv[1]);
