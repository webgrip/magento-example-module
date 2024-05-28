<?php

declare(strict_types=1);

namespace ViewModels;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class Dummy implements ArgumentInterface
{
    public function __construct(private ProductRepositoryInterface $productRepository) {
    }

    public function getProductById(int $id): ProductInterface
    {
        return $this->productRepository->getById($id);
    }
}
