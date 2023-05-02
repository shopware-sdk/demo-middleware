<?php declare(strict_types=1);

namespace App\Tests;

final class Fixtures
{
    public static function getProduct(): array
    {
        return json_decode(file_get_contents(__DIR__ . '/../file/product/product.json'), true);
    }
}
