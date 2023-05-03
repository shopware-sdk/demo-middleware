<?php declare(strict_types=1);

namespace App\Tests\Unit\Component\Product\Business\Collection;

use App\Component\Product\Business\Collection\MainData;
use App\Tests\Fixtures;
use PHPUnit\Framework\TestCase;
use ShopwareSdk\Model\Product;

final class MainDataTest extends TestCase
{
    public function test()
    {
        $data = Fixtures::getProduct();
        $product = new Product();

        $product = (new MainData())->map($data, $product);

        self::assertSame($data['title'], $product->name);
        self::assertSame(md5('product-' . $data['dan']), $product->id);
        self::assertSame($data['details']['descriptionText'], $product->description);
        self::assertSame((string)$data['dan'], $product->productNumber);
        self::assertTrue($product->isCloseout);
        self::assertSame(99, $product->stock);
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
