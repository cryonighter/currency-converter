<?php

namespace Cryonighter\CurrencyConverter\Test;

use Cryonighter\CurrencyConverter\CurrencyCodeConverter;
use Cryonighter\CurrencyConverter\Exception\CodeCurrencyConvertException;
use PHPUnit\Framework\TestCase;

class CurrencyCodeConverterTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->currencyCodeConverter = new CurrencyCodeConverter();
    }

    /**
     * @throws CodeCurrencyConvertException
     */
    public function testCharToNum(): void
    {
        $this->assertEquals('840', $this->currencyCodeConverter->charToNum('USD'));
        $this->assertEquals('978', $this->currencyCodeConverter->charToNum('EUR'));
        $this->assertEquals('643', $this->currencyCodeConverter->charToNum('RUB'));
    }

    /**
     * @throws CodeCurrencyConvertException
     */
    public function testNumToNum(): void
    {
        $this->assertEquals('840', $this->currencyCodeConverter->charToNum('840'));
        $this->assertEquals('978', $this->currencyCodeConverter->charToNum('978'));
        $this->assertEquals('643', $this->currencyCodeConverter->charToNum('643'));
    }

    /**
     * @throws CodeCurrencyConvertException
     */
    public function testNumToChar(): void
    {
        $this->assertEquals('USD', $this->currencyCodeConverter->numToChar('840'));
        $this->assertEquals('EUR', $this->currencyCodeConverter->numToChar('978'));
        $this->assertEquals('RUB', $this->currencyCodeConverter->numToChar('643'));
    }

    /**
     * @throws CodeCurrencyConvertException
     */
    public function testCharToChar(): void
    {
        $this->assertEquals('USD', $this->currencyCodeConverter->numToChar('USD'));
        $this->assertEquals('EUR', $this->currencyCodeConverter->numToChar('EUR'));
        $this->assertEquals('RUB', $this->currencyCodeConverter->numToChar('RUB'));
    }
}
