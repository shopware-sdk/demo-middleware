<?php declare(strict_types=1);

namespace App\Component\Product\Business\Collection;

use ShopwareSdk\Model\Product;
use Symfony\Component\DependencyInjection\Attribute\AutoconfigureTag;

#[AutoconfigureTag('product_import.mapping')]
interface ProductImportCollectionInterface
{
    public function map(array $productData, Product $product): Product;
}
