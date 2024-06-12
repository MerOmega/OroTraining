<?php

namespace Fantasy\Bundle\DemoBundle\Layout\DataProvider;

use Oro\Bundle\ProductBundle\Entity\Product as ProductEntity;

class ProductProvider
{
    public function getInventoryStatus(ProductEntity $product): string
    {
        return $product->getInventoryStatus()->getName();
    }
}
