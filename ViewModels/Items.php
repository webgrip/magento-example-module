<?php

declare(strict_types=1);

namespace ViewModels;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use WebGrip\ExampleModule\ViewModels\ExampleItemCollectionFactory;

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
