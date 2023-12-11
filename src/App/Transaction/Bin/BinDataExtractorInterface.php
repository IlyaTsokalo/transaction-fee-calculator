<?php

namespace App\Transaction\Bin;

use Shared\Transaction\Bin\Transfer\BinTransfer;

interface BinDataExtractorInterface
{

    /**
     * @param \Shared\Transaction\Bin\Transfer\BinTransfer $binTransfer
     *
     * @return \Shared\Transaction\Bin\Transfer\BinTransfer
     */
    public function getCountryFeeRate(BinTransfer $binTransfer): BinTransfer;
}
