<?php declare(strict_types=1);

namespace App\Component\Product\Business\Collection;

use ShopwareSdk\Model\Product;

final class MainData implements ProductImportCollectionInterface
{
    public function map(array $productData, Product $product): Product
    {
        $product->name = $product['title'];
        $product->description = $product['details']['descriptionText'];
        $product->productNumber = $product['dan'];
        $product->isCloseout = true;

        return $product;
    }

}
