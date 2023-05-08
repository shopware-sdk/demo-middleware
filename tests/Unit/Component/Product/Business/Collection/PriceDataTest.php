<?php declare(strict_types=1);

namespace App\Tests\Unit\Component\Product\Business\Collection;

use App\Component\Product\Business\Collection\MainData;
use App\Component\Product\Business\Collection\PriceData;
use App\Tests\Fixtures;
use PHPUnit\Framework\TestCase;
use App\ShopwareSdk\Product as ProductShopwareSdk;
use ShopwareSdk\Model\Product;

final class PriceDataTest extends TestCase
{
    public function test()
    {
        $data = Fixtures::getProduct();

        $productShopwareSdk = $this->createMock(ProductShopwareSdk::class);

        $tax = Fixtures::getTax();
        $productShopwareSdk->method('getTax')->willReturn($tax);

        $currency = Fixtures::getCurrency();
        $productShopwareSdk->method('getCurrencyByIsoCode')->willReturn($currency);

        $product = new Product();

        $product = (new PriceData($productShopwareSdk))->map($data, $product);

        self::assertSame(1, count($product->price));
        self::assertSame($currency->id, $product->price[0]->currencyId);
        self::assertSame(4.95, $product->price[0]->gross);
        self::assertSame(4.16, $product->price[0]->net);
        self::assertFalse($product->price[0]->linked);

        self::assertSame($tax->id, $product->taxId);
    }

    public function testStockZero()
    {
        $data = Fixtures::getProduct();
        $data['purchasable'] = false;
        $product = new Product();

        $product = (new MainData())->map($data, $product);

        self::assertSame(0, $product->stock);
    }

}
