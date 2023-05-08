<?php declare(strict_types=1);

namespace App\Component\Product\Business\Collection;

use App\ShopwareSdk\Product as ProductShopwareSdk;
use ShopwareSdk\Model\Price;
use ShopwareSdk\Model\Product;

final class PriceData implements ProductImportCollectionInterface
{
    private string $currencyId = '';
    public function __construct(
        private readonly ProductShopwareSdk $productShopwareSdk,
    )
    {
    }

    public function map(array $productData, Product $product): Product
    {
        $tax = $this->productShopwareSdk->getTax($productData["vat"]['taxRate']);

        $product->taxId = $tax->id;

        $price = new Price();

        $price->currencyId = $this->getCurrencyId();
        $price->gross = (float) ($productData['priceDigit'] . '.' . $productData['priceDecimal']);
        $price->net = (float) ($productData['netPriceDigit'] . '.' . $productData['netPriceDecimal']);
        $price->linked = false;

        $product->price[] = $price;

        return $product;
    }

    private function getCurrencyId(): string
    {
        if ($this->currencyId === '') {
            $this->currencyId = $this->productShopwareSdk->getCurrencyByIsoCode('EUR')->id;
        }

        return $this->currencyId;
    }
}
