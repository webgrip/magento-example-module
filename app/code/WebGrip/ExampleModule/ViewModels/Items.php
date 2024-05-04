<?php

declare(strict_types=1);

namespace WebGrip\ExampleModule\ViewModels;

use Magento\Framework\View\Element\Block\ArgumentInterface;

class Items implements ArgumentInterface
{
    public function __construct(private ExampleItemCollectionFactory $exampleItemCollectionFactory) {
    }

    public function getExampleItemById(int $id): array
    {
        $collection = $this->exampleItemCollectionFactory->create();

        $collection->addFieldToFilter('id', $id);

        return $collection->getItems();
    }
}
