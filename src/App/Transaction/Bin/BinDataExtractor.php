<?php

namespace App\Transaction\Bin;

use Shared\Transaction\Bin\Enum\BinEnum;
use Shared\Transaction\Bin\Transfer\BinTransfer;
use Shared\Transaction\TransactionConstants;

/**
 * Extracts various bin data from BinTransfer
 */
class BinDataExtractor implements BinDataExtractorInterface
{
    /**
     * @param \Shared\Transaction\Bin\Transfer\BinTransfer $binTransfer
     *
     * @return \Shared\Transaction\Bin\Transfer\BinTransfer
     */
    public function getCountryFeeRate(BinTransfer $binTransfer): BinTransfer
    {
        $isEuropeCountryCode = (BinEnum::tryFrom($binTransfer->countryCode) !== null);

        $binTransfer->countryFeeRate = $isEuropeCountryCode ? TransactionConstants::EUROPE_COUNTRY_FEE_RATE : TransactionConstants::NON_EUROPE_COUNTRY_FEE_RATE;

        return $binTransfer;
    }
}
