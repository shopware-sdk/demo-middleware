<?php declare(strict_types=1);

namespace App\Tests;

use ShopwareSdk\Model\Currency;
use ShopwareSdk\Model\Tax;

final class Fixtures
{
    public static function getProduct(): array
    {
        return json_decode(file_get_contents(__DIR__ . '/../file/product/product.json'), true);
    }

    public static function getTax(): Tax
    {
        $tax = new Tax();
        $tax->id = 'tax-id';
        $tax->taxRate = 19.0;
        $tax->name = 'tax-name';

        return $tax;
    }

    public static function getCurrency(): Currency
    {
        $currency = new Currency();
        $currency->id = 'currency-id';
        $currency->name = 'currency-name';
        $currency->isoCode = 'EUR';

        return $currency;
    }
}
