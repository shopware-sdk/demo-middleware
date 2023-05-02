<?php declare(strict_types=1);

namespace App\Component\Product\Business;

use ShopwareSdk\Model\Product;
use Symfony\Component\DependencyInjection\Attribute\TaggedIterator;

final class ProductImport
{
    public function __construct(
        #[TaggedIterator('product_import.mapping')]
        private readonly iterable $mappers,
    )
    {
    }

    public function import(): void
    {
        $file = __DIR__ . '/../../../../file/product/product.json';
        $productData = json_decode(file_get_contents($file), true);

        $product = new Product();

        foreach ($this->mappers as $mapper) {
            $product = $mapper->map($productData, $product);
        }

    }
}
