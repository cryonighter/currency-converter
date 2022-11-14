# Currency Converter

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-actions]][link-actions]
<!-- [![Coverage Status][ico-scrutinizer]][link-scrutinizer] -->
<!-- [![Quality Score][ico-code-quality]][link-code-quality] -->

This package allows you to convert exchange rates according to the rate of the Central Bank of Russia (but you can use any other sources of exchange rates)

## Highlights

- Simple API
- Framework Agnostic
- Composer ready, [PSR-2][] and [PSR-4][] compliant

## System Requirements

You need:

- **PHP >= 8.1.0** but the latest stable version of PHP is recommended

## Install

Via Composer

``` bash
$ composer require cryonighter/currency-converter
```

## Usage

``` php
use Cryonighter\CurrencyConverter\CurrencyCodeConverter;
use Cryonighter\CurrencyConverter\CurrencyConverter;
use Cryonighter\CurrencyConverter\Provider\CbrCurrencyRateProvider;

// Get a list of exchange rates. By default, the package provides a service for receiving rates from the server of the Central Bank of Russia.
// However, you can use any source of currency rates, you only need to form an array of instances of the CurrencyRate class.
$currencyRates = CbrCurrencyRateProvider::getCurrencyRates();

// Build the converter object
$currencyConverter = new CurrencyConverter(new CurrencyCodeConverter(), $currencyRates);

// To convert 100 USD to EUR
$amount = $currencyConverter->convert(100, 'USD', 'EUR');

// You can also use numeric currency codes
$amount = $currencyConverter->convert(100, '840', '978');

// You can mix and match :)
$amount = $currencyConverter->convert(100, '840', 'EUR');
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ php vendor/phpunit/phpunit/phpunit tests
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email `cryonighter@yandex.ru` instead of using the issue tracker.

## Credits

- [Andrey Reshetchenko][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[PSR-2]: http://www.php-fig.org/psr/psr-2/
[PSR-4]: http://www.php-fig.org/psr/psr-4/

[ico-version]: https://img.shields.io/packagist/v/cryonighter/currency-converter.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-actions]: https://github.com/cryonighter/currency-converter/workflows/Tests/badge.svg?branch=master
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/cryonighter/currency-converter.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/cryonighter/currency-converter.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/cryonighter/currency-converter.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/cryonighter/currency-converter
[link-actions]: https://github.com/cryonighter/currency-converter
[link-scrutinizer]: https://scrutinizer-ci.com/g/cryonighter/currency-converter/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/cryonighter/currency-converter
[link-downloads]: https://packagist.org/packages/cryonighter/currency-converter
[link-author]: https://github.com/cryonighter
[link-contributors]: ../../contributors
