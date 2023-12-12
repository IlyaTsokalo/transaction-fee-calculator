<?php

namespace Unit\Transaction;

require dirname(__DIR__, 3) . '/vendor/autoload.php';

use App\Transaction\TransactionFacade;
use App\Transaction\TransactionFactory;
use PHPUnit\Framework\TestCase;
use Shared\Transaction\TransactionConstants;
use Shared\Transaction\Transfer\TransactionTransfer;

final class TransactionFacadeTest extends TestCase
{
    /**
     * @dataProvider transactionFeeDataProvider
     */
    public function testCalculateTransactionFee(TransactionTransfer $transactionTransfer, $expectedTransactionFee): void
    {
        //Arrange
        $expectedTransactionTransfer = clone $transactionTransfer;
        $expectedTransactionTransfer->transactionFee = $expectedTransactionFee;

        $transactionFacade = new TransactionFacade(new TransactionFactory());

        // Act
        $result = $transactionFacade->calculateTransactionFee($transactionTransfer);

        // Assert
        $this->assertEquals($expectedTransactionTransfer, $result);
    }

    public static function transactionFeeDataProvider(): array
    {
        return [
            'Non-European Country Fee Rate' => [
                new TransactionTransfer([
                    'bin' => 1,
                    'amount' => 150.00,
                    'currency' => 'EUR',
                    'currencyRate' => 1,
                    'countryFeeRate' => TransactionConstants::NON_EUROPE_COUNTRY_FEE_RATE,
                ]),
                3.0
            ],
            'European Country Fee Rate' => [
                new TransactionTransfer([
                    'bin' => 1,
                    'amount' => 150.00,
                    'currency' => 'EUR',
                    'currencyRate' => 1,
                    'countryFeeRate' => TransactionConstants::EUROPE_COUNTRY_FEE_RATE,
                ]),
                1.5
            ],
        ];
    }
}
