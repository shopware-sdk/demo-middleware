<?php declare(strict_types=1);

namespace App\Component\Product\Business\Collection;

use ShopwareSdk\Model\Product;

final class MainData implements ProductImportCollectionInterface
{
    public function map(array $productData, Product $product): Product
    {
        $product->id = md5('product-' . $productData['dan']);
        $product->name = $productData['title'];
        $product->description = $productData['details']['descriptionText'];
        $product->productNumber = (string)$productData['dan'];
        $product->isCloseout = true;
        $product->stock = $productData['purchasable'] ? 99 : 0;

        return $product;
    }

}
