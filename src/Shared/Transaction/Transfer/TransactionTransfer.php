<?php

namespace Shared\Transaction\Transfer;

use AllowDynamicProperties;
use Spatie\DataTransferObject\DataTransferObject;


#[AllowDynamicProperties]
class TransactionTransfer extends DataTransferObject
{
    public int $bin;

    public float $amount;

    public string $currency;

    public ?float $currencyRate;

    public ?float $countryFeeRate;

    public ?float $transactionFee;
}
