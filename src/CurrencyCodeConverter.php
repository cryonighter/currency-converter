<?php

namespace Cryonighter\CurrencyConverter;

use Cryonighter\CurrencyConverter\Exception\CodeCurrencyConvertException;

class CurrencyCodeConverter
{
    public const ISO_4217 = [
        '784' => 'AED',
        '971' => 'AFA',
        '894' => 'AMK',
        '051' => 'AMD',
        '533' => 'AWG',
        '036' => 'AUD',
        '032' => 'ARS',
        '944' => 'AZN',
        '044' => 'BSD',
        '050' => 'BDT',
        '052' => 'BBD',
        '933' => 'BYN',
        '974' => 'BYR',
        '068' => 'BOB',
        '986' => 'BRL',
        '826' => 'GBP',
        '975' => 'BGN',
        '116' => 'KHR',
        '417' => 'KGS',
        '136' => 'KYD',
        '124' => 'CAD',
        '152' => 'CLP',
        '156' => 'CNY',
        '170' => 'COP',
        '188' => 'CRC',
        '191' => 'HRK',
        '196' => 'CPY',
        '203' => 'CZK',
        '208' => 'DKK',
        '214' => 'DOP',
        '951' => 'XCD',
        '818' => 'EGP',
        '232' => 'ERN',
        '233' => 'EEK',
        '978' => 'EUR',
        '981' => 'GEL',
        '288' => 'GHC',
        '292' => 'GIP',
        '320' => 'GTQ',
        '340' => 'HNL',
        '344' => 'HKD',
        '348' => 'HUF',
        '352' => 'ISK',
        '356' => 'INR',
        '360' => 'IDR',
        '376' => 'ILS',
        '388' => 'JMD',
        '392' => 'JPY',
        '368' => 'KZT',
        '404' => 'KES',
        '414' => 'KWD',
        '428' => 'LVL',
        '422' => 'LBP',
        '440' => 'LTL',
        '446' => 'MOP',
        '807' => 'MKD',
        '969' => 'MGA',
        '458' => 'MYR',
        '470' => 'MTL',
        '977' => 'BAM',
        '480' => 'MUR',
        '484' => 'MXN',
        '508' => 'MZM',
        '498' => 'MDL',
        '985' => 'PLN',
        '960' => 'XDR',
        '972' => 'TJS',
        '934' => 'TMT',
        '524' => 'NPR',
        '532' => 'ANG',
        '901' => 'TWD',
        '554' => 'NZD',
        '558' => 'NIO',
        '566' => 'NGN',
        '408' => 'KPW',
        '578' => 'NOK',
        '512' => 'OMR',
        '586' => 'PKR',
        '600' => 'PYG',
        '604' => 'PEN',
        '608' => 'PHP',
        '634' => 'QAR',
        '946' => 'RON',
        '643' => 'RUB',
        '682' => 'SAR',
        '891' => 'CSD',
        '690' => 'SCR',
        '702' => 'SGD',
        '703' => 'SKK',
        '705' => 'SIT',
        '710' => 'ZAR',
        '410' => 'KRW',
        '144' => 'LKR',
        '968' => 'SRD',
        '752' => 'SEK',
        '756' => 'CHF',
        '834' => 'TZS',
        '764' => 'THB',
        '780' => 'TTD',
        '949' => 'TRY',
        '840' => 'USD',
        '800' => 'UGX',
        '980' => 'UAH',
        '858' => 'UYU',
        '860' => 'UZS',
        '862' => 'VEB',
        '704' => 'VND',
        '716' => 'ZWD',
    ];

    public function __construct(private readonly array $data = self::ISO_4217)
    {
    }

    /**
     * @throws CodeCurrencyConvertException
     */
    public function charToNum(string $charCode): string
    {
        if (isset($this->data[$charCode])) {
            return $charCode;
        }

        return array_search($charCode, $this->data) ?: throw new CodeCurrencyConvertException("Currency code $charCode unknown");
    }

    /**
     * @throws CodeCurrencyConvertException
     */
    public function numToChar(string $numCode): string
    {
        if (isset($this->data[$numCode])) {
            return $this->data[$numCode];
        }

        if (in_array($numCode, $this->data)) {
            return $numCode;
        }

        throw new CodeCurrencyConvertException("Currency code $numCode unknown");
    }
}
