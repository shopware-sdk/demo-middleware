<?php declare(strict_types=1);

namespace App\ShopwareSdk;

use ShopwareSdk\AdminApi;
use ShopwareSdk\Model\Currency;
use ShopwareSdk\Model\Tax;

/**
 * @experimental It may be that the functionality come in extra package
 */
class Product
{
    public function __construct(
        private readonly AdminApi $adminApi
    )
    {
    }

    public function getCurrencyByIsoCode(string $isoCode): ?Currency
    {
        return $this->adminApi->currency->getAll(['filter' => ['isoCode' => $isoCode]])->entities[0] ?? null;
    }

    public function getTax(float $taxRate): ?Tax
    {
        return $this->adminApi->tax->getAll(['filter' => ['taxRate' => $taxRate]])->entities[0] ?? null;
    }


}
