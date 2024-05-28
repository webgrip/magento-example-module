<?php

namespace WebGrip\ExampleModule\Plugins;

use Magento\Catalog\Api\Data\ProductInterface;

class ModifyProductData
{
    public function afterGetName(ProductInterface $subject, $result): array
    {
        return [strtoupper($result . ' (Modified)')];
    }

    public function beforeSetName(ProductInterface $product, string $name): string
    {
        return 'asdasd';
    }

    public function aroundSetName(ProductInterface $subject, callable $proceed, string $name): string
    {
        return $proceed($name . ' (Modified)');
    }
}
