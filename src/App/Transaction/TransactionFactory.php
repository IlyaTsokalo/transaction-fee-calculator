<?php

namespace App\Transaction;

use App\Transaction\Bin\BinDataExtractor;
use App\Transaction\Bin\BinDataExtractorInterface;
use App\Transaction\Bin\BinReader;
use App\Transaction\Bin\BinReaderInterface;
use App\Transaction\Calculator\TransactionFeeCalculator;
use App\Transaction\Calculator\TransactionFeeCalculatorInterface;
use App\Transaction\Converter\TransactionConverter;
use App\Transaction\Converter\TransactionConverterInterface;
use App\Transaction\Currency\CurrencyRateProvider;
use App\Transaction\Currency\CurrencyRateProviderInterface;
use App\Transaction\Mapper\TransactionMapper;
use App\Transaction\Mapper\TransactionMapperInterface;
use App\Transaction\Printer\TransactionPrinter;
use App\Transaction\Printer\TransactionPrinterInterface;

class TransactionFactory
{
    /**
     * @return \App\Transaction\Calculator\TransactionFeeCalculator
     */
    public function createTransactionFeeCalculator(): TransactionFeeCalculatorInterface
    {
        return new TransactionFeeCalculator();
    }

    /**
     * @return \App\Transaction\Converter\TransactionConverterInterface
     */
    public function createTransactionConverter(): TransactionConverterInterface
    {
        return new TransactionConverter();
    }

    /**
     * @return \App\Transaction\Mapper\TransactionMapperInterface
     */
    public function createTransactionMapper(): TransactionMapperInterface
    {
        return new TransactionMapper();
    }

    /**
     * @return \App\Transaction\Bin\BinReaderInterface
     */
    public function createBinReader(): BinReaderInterface
    {
        return new BinReader();
    }

    /**
     * @return \App\Transaction\Bin\BinDataExtractorInterface
     */
    public function createBinExtractor(): BinDataExtractorInterface
    {
        return new BinDataExtractor();
    }

    /**
     * @return \App\Transaction\Currency\CurrencyRateProviderInterface
     */
    public function createCurrencyRateProvider(): CurrencyRateProviderInterface
    {
        return new CurrencyRateProvider();
    }

    /**
     * @return \App\Transaction\Printer\TransactionPrinterInterface
     */
    public function createPrinter(): TransactionPrinterInterface
    {
        return new TransactionPrinter();
    }
}
