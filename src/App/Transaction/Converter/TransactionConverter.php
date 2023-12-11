<?php

namespace App\Transaction\Converter;

use Shared\Transaction\Currency\Enum\CurrencyEnum;
use Shared\Transaction\Transfer\TransactionTransfer;

class TransactionConverter implements TransactionConverterInterface
{
    /**
     * @param string $inputFileName
     *
     * @return array
     */
    public function convertTransactionTextToTransactions(string $inputFileName): array
    {
        $fileContent = file_get_contents($inputFileName);

        $lines = explode(PHP_EOL, $fileContent);

        $jsonObjects = [];

        foreach ($lines as $line) {
            $decodedLine = json_decode($line, true);

            if (!$decodedLine) {
                continue;
            }

            $jsonObjects[] = $decodedLine;
        }

        return $jsonObjects;
    }


    /**
     * @param \Shared\Transaction\Transfer\TransactionTransfer $transactionTransfer
     *
     * @return \Shared\Transaction\Transfer\TransactionTransfer
     */
    public function convertTransactionAmountToFinalCurrency(TransactionTransfer $transactionTransfer): TransactionTransfer
    {
        if (!$transactionTransfer->currency) {
            return $transactionTransfer;
        }

        $isEuroCurrency = $transactionTransfer->currency == CurrencyEnum::CURRENCY_EURO;

        if (!$isEuroCurrency && $transactionTransfer->currencyRate > 0) {
            $transactionTransfer->amount = $transactionTransfer->amount / $transactionTransfer->currencyRate;
        }

        return $transactionTransfer;
    }
}
