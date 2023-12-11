<?php

namespace App\Transaction\Bin;

use Exception;
use Shared\Transaction\Bin\Transfer\BinTransfer;
use Shared\Transaction\TransactionConstants;
use Shared\Transaction\Transfer\TransactionTransfer;

/**
 * Reads bin to BinTransfer from some API
 */
class BinReader implements BinReaderInterface
{

    /**
     * @param \Shared\Transaction\Transfer\TransactionTransfer $transactionTransfer
     *
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     * @return \Shared\Transaction\Bin\Transfer\BinTransfer
     */
    public function getBin(TransactionTransfer $transactionTransfer): BinTransfer
    {
        $binResults = file_get_contents(
            sprintf(TransactionConstants::GET_BIN_URL, $transactionTransfer->bin)
        );

        if (!$binResults) {
            throw new Exception('no bin results');
        }

        $decodedResult = json_decode($binResults, true);

        if ($decodedResult === false) {
            throw new Exception('bin results malformed , can not proceed');
        }

        return new BinTransfer($decodedResult);
    }
}
