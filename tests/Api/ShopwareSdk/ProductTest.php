<?php declare(strict_types=1);

namespace App\Tests\Api\ShopwareSdk;

use App\ShopwareSdk\Product;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

final class ProductTest extends KernelTestCase
{
    private Product $product;

    protected function setUp(): void
    {
        parent::setUp();

        $container = self::getContainer();
        $this->product = $container->get(Product::class);
    }

    public function testGetCurrencyByIsoCode(): void
    {
        $currency = $this->product->getCurrencyByIsoCode('EUR');

        self::assertSame('EUR', $currency->isoCode);
    }

    public function testNotFoundGetCurrencyByIsoCode(): void
    {
        $currency = $this->product->getCurrencyByIsoCode('TEST');

        self::assertNull($currency);
    }

}
