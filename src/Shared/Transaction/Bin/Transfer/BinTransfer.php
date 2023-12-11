<?php

namespace Shared\Transaction\Bin\Transfer;

use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\DataTransferObject;

#[\AllowDynamicProperties]
class BinTransfer extends DataTransferObject
{
    #[MapFrom('country.alpha2')]
    public string $countryCode;

    public ?float $countryFeeRate;
}

