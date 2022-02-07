<?php

namespace Cryonighter\CurrencyConverter\Provider;

use Cryonighter\CurrencyConverter\Data\CurrencyRate;

class CbrCurrencyRateProvider
{
    /**
     * @return CurrencyRate[]
     */
    public static function getCurrencyRates(): array
    {
        $data = [];

        foreach (xml_to_array(file_get_contents('https://www.cbr.ru/scripts/XML_daily.asp'))['Valute'] as $currency) {
            $charCode = $currency['CharCode'];

            $data[$charCode] = new CurrencyRate(
                round(str_replace(',', '.', $currency['Value']), 4),
                $currency['Nominal'],
                $charCode,
                $currency['NumCode'],
                $currency['Name'],
            );
        }

        return $data;
    }
}
