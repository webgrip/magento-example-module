<?php

declare(strict_types=1);

namespace WebGrip\ExampleModule\Magewire;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Api\Search\FilterGroupBuilder;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SortOrderBuilder;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class Dummy implements ArgumentInterface
{
    public function __construct(
        private ProductRepositoryInterface $productRepository,
        private SearchCriteriaBuilder $searchCriteriaBuilder,
        private FilterGroupBuilder $filterGroupBuilder,
        private SortOrderBuilder $sortOrderBuilder
    ) {
    }

    public function getSomeProducts(string $search): array
    {
        $filterGroup = $this->filterGroupBuilder->create();
        $filterGroup->setFilters([
            $this->filterBuilder->setField('name')->setValue('value')->create()
        ]);

        $searchCriteria = $this->searchCriteriaBuilder->create();
//        $searchCriteria->addFilter('name', '%' . $search . '%', 'like');
        $searchCriteria->setPageSize(5);
        $searchCriteria->setCurrentPage(1);
        $searchCriteria->setFilterGroups([
            $filterGroup
        ]);

        $searchCriteria->setSortOrders([
            $this->sortOrderBuilder->setField('name')->setDirection('ASC')->create()
        ]);

        return $this->productRepository->getList($searchCriteria)->getItems();;
    }

    public function getProductById(int $id): ProductInterface
    {
        return $this->productRepository->getById($id);
    }
}
