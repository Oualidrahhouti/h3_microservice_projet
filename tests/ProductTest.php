<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\Product;


class ProductTest extends TestCase
{
    public function testNameGetterAndSetter(): void
    {
        $product = new Product();

        $this->assertNull($product->getName(), 'Name should be null by default.');

        $product->setName('Test Product');
        $this->assertEquals('Test Product', $product->getName());
    }

    public function testIdIsNullByDefault(): void
    {
        $product = new Product();
        $this->assertNull($product->getId(), 'ID should be null by default (not persisted yet).');
    }
}
