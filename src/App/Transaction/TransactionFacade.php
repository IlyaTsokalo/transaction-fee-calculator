<?php

namespace App\Transaction;

use Exception;
use Shared\Transaction\Bin\Transfer\BinTransfer;
use Shared\Transaction\Transfer\TransactionTransfer;

class TransactionFacade
{
    /**
     * @param \App\Transaction\TransactionFactory $transactionFactory
     */
    public function __construct(protected TransactionFactory $transactionFactory)
    {
    }

    /**
     * @param string $inputFileName
     *
     * @return array
     */
    public function convertTransactionTextToTransactions(string $inputFileName): array
    {
        return $this->transactionFactory
            ->createTransactionConverter()
            ->convertTransactionTextToTransactions($inputFileName);
    }

    /**
     * @param \Shared\Transaction\Transfer\TransactionTransfer $transactionTransfer
     *
     * @return \Shared\Transaction\Transfer\TransactionTransfer
     */
    public function calculateTransactionFee(TransactionTransfer $transactionTransfer): TransactionTransfer
    {
        return $this->transactionFactory
            ->createTransactionFeeCalculator()
            ->calculate($transactionTransfer);
    }


    /**
     * @param array $transactions
     *
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     * @return array
     */
    public function mapTransactionsToTransactionTransfers(array $transactions): array
    {
        return $this->transactionFactory
            ->createTransactionMapper()
            ->mapTransactionsToTransactionTransfers($transactions);
    }

    /**
     * @param \Shared\Transaction\Transfer\TransactionTransfer $transactionTransfer
     *
     * @return \Shared\Transaction\Bin\Transfer\BinTransfer
     */
    public function getBin(TransactionTransfer $transactionTransfer): BinTransfer
    {
        return $this->transactionFactory
            ->createBinReader()
            ->getBin($transactionTransfer);
    }

    /**
     * @param \Shared\Transaction\Bin\Transfer\BinTransfer $binTransfer
     *
     * @return float
     */
    public function getCountryFeeRate(BinTransfer $binTransfer): BinTransfer
    {
        return $this->transactionFactory
            ->createBinExtractor()
            ->getCountryFeeRate($binTransfer);
    }

    /**
     * @param \Shared\Transaction\Transfer\TransactionTransfer $transactionTransfer
     *
     * @return \Shared\Transaction\Transfer\TransactionTransfer
     */
    public function getCurrencyRate(TransactionTransfer $transactionTransfer): TransactionTransfer
    {
        return $this->transactionFactory
            ->createCurrencyRateProvider()
            ->getCurrencyRate($transactionTransfer);
    }

    /**
     * @param \Shared\Transaction\Transfer\TransactionTransfer $transactionTransfer
     *
     * @return void
     */
    public function printTransaction(TransactionTransfer $transactionTransfer): void
    {
        $this->transactionFactory
            ->createPrinter()
            ->printTransaction($transactionTransfer);
    }

    /**
     * @param \Exception $exception
     *
     * @return void
     */
    public function printError(Exception $exception): void
    {
        $this->transactionFactory
            ->createPrinter()
            ->printError($exception);
    }

    /**
     * @param \Shared\Transaction\Transfer\TransactionTransfer $transactionTransfer
     *
     * @return \Shared\Transaction\Transfer\TransactionTransfer
     */
    public function convertTransactionAmountToFinalCurrency(TransactionTransfer $transactionTransfer): TransactionTransfer
    {
        return $this->transactionFactory
            ->createTransactionConverter()
            ->convertTransactionAmountToFinalCurrency($transactionTransfer);
    }
}
