<?php

namespace Cryonighter\CurrencyConverter;

use Cryonighter\CurrencyConverter\Data\CurrencyRate;
use Cryonighter\CurrencyConverter\Exception\CurrencyConvertException;

class CurrencyConverter
{
    /**
     * @param CurrencyCodeConverter  $currencyCodeConverter
     * @param array | CurrencyRate[] $currencyRates
     */
    public function __construct(private CurrencyCodeConverter $currencyCodeConverter, private array $currencyRates)
    {
    }

    /**
     * @throws CurrencyConvertException
     */
    public function convert(float $amount, string $currencyCodeFrom, string $currencyCodeTo): float
    {
        $currencyCodeFrom = $this->currencyCodeConverter->numToChar($currencyCodeFrom);
        $currencyCodeTo = $this->currencyCodeConverter->numToChar($currencyCodeTo);

        if ($currencyCodeFrom == $currencyCodeTo) {
            return $amount;
        }

        return $this->convertFromRub($this->convertToRub($amount, $currencyCodeFrom), $currencyCodeTo);
    }

    /**
     * @throws CurrencyConvertException
     */
    private function convertToRub(float $amount, string $currencyCodeFrom): float
    {
        if ($currencyCodeFrom == 'RUB') {
            return $amount;
        }

        $currencyRate = $this->getCurrencyRate($currencyCodeFrom);

        return $amount / $currencyRate->nominal * $currencyRate->value;
    }

    /**
     * @throws CurrencyConvertException
     */
    private function convertFromRub(float $amount, string $currencyCodeTo): float
    {
        if ($currencyCodeTo == 'RUB') {
            return $amount;
        }

        $currencyRate = $this->getCurrencyRate($currencyCodeTo);

        return $amount * $currencyRate->nominal / $currencyRate->value;
    }

    /**
     * @throws CurrencyConvertException
     */
    private function getCurrencyRate(string $currencyCode): CurrencyRate
    {
        return $this->currencyRates[$currencyCode] ?? throw new CurrencyConvertException("The currency rate $currencyCode is not known");
    }
}
