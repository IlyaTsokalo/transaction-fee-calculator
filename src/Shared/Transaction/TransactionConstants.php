<?php

namespace Shared\Transaction;

interface TransactionConstants
{
    public const EUROPE_COUNTRY_FEE_RATE = 0.01;
    public const NON_EUROPE_COUNTRY_FEE_RATE = 0.02;
    public const GET_BIN_URL = 'https://lookup.binlist.net/%s';
    public const GET_CURRENCY_RATE_URL = 'http://api.exchangeratesapi.io/latest?access_key=%s';
}
