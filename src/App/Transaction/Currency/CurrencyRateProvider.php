<?php

namespace App\Transaction\Currency;

use Exception;
use Shared\Transaction\TransactionConstants;
use Shared\Transaction\Transfer\TransactionTransfer;

class CurrencyRateProvider implements CurrencyRateProviderInterface
{
    /**
     * @param \Shared\Transaction\Transfer\TransactionTransfer $transactionTransfer
     *
     * @throws \Exception
     * @return \Shared\Transaction\Transfer\TransactionTransfer
     */
    public function getCurrencyRate(TransactionTransfer $transactionTransfer): TransactionTransfer
    {
        $currencyRate = json_decode(file_get_contents(sprintf(TransactionConstants::GET_CURRENCY_RATE_URL, getenv('EXCHANGE_RATES_API_KEY'))));

        if (!$currencyRate->success) {
            throw new Exception(sprintf("Failed to retrieve currency rates from the API . Info: %s", $currencyRate?->error?->info));
        }

        $transactionTransfer->currencyRate = $currencyRate->rates->{$transactionTransfer->currency};

        return $transactionTransfer;
    }
}
