<?php

namespace Cryonighter\CurrencyConverter\Test;

use Cryonighter\CurrencyConverter\CurrencyCodeConverter;
use Cryonighter\CurrencyConverter\CurrencyConverter;
use Cryonighter\CurrencyConverter\Data\CurrencyRate;
use Cryonighter\CurrencyConverter\Exception\CurrencyConvertException;
use PHPUnit\Framework\TestCase;

class CurrencyConverterTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->currencyConverter = new CurrencyConverter(
            new CurrencyCodeConverter(),
            [
                'USD' => new CurrencyRate(50, 1, 'USD', '840', 'Доллар США'),
                'UAH' => new CurrencyRate(20, 10, 'UAH', '980', 'Украинская гривна'),
                'JPY' => new CurrencyRate(40, 100, 'JPY', '392', 'Японская иена'),
            ]
        );
    }

    /**
     * @throws CurrencyConvertException
     */
    public function testConvert(): void
    {
        $this->assertEquals(100, $this->currencyConverter->convert(100, 'RUB', 'RUB'));
        $this->assertEquals(100, $this->currencyConverter->convert(100, '643', 'RUB'));
        $this->assertEquals(100, $this->currencyConverter->convert(100, 'RUB', '643'));
        $this->assertEquals(100, $this->currencyConverter->convert(100, '643', '643'));

        $this->assertEquals(5000, $this->currencyConverter->convert(100, 'USD', 'RUB'));
        $this->assertEquals(5000, $this->currencyConverter->convert(100, '840', 'RUB'));
        $this->assertEquals(5000, $this->currencyConverter->convert(100, 'USD', '643'));
        $this->assertEquals(5000, $this->currencyConverter->convert(100, '840', '643'));

        $this->assertEquals(2500, $this->currencyConverter->convert(100, 'USD', 'UAH'));
        $this->assertEquals(2500, $this->currencyConverter->convert(100, '840', 'UAH'));
        $this->assertEquals(2500, $this->currencyConverter->convert(100, 'USD', '980'));
        $this->assertEquals(2500, $this->currencyConverter->convert(100, '840', '980'));

        $this->assertEquals(250, $this->currencyConverter->convert(100, 'RUB', 'JPY'));
        $this->assertEquals(250, $this->currencyConverter->convert(100, '643', 'JPY'));
        $this->assertEquals(250, $this->currencyConverter->convert(100, 'RUB', '392'));
        $this->assertEquals(250, $this->currencyConverter->convert(100, '643', '392'));
    }
}
