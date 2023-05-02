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

        self::assertSame($data['name'], $product->name);
    }
}
