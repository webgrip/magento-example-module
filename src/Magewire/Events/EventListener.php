<?php

declare(strict_types=1);

namespace Magewirephp\MagewireExamples\Magewire\Events;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Api\Search\FilterGroupBuilder;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SortOrderBuilder;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use WebGrip\ExampleModule\Magewire\LoggerInterface;

class EventListener extends  \Magewirephp\Magewire\Component
{
    protected $listeners = [
        'simple' => 'processEvent',
        'complex' => 'processEvent'
    ];

    public array $processedEvents = [];

    public function __construct(private LoggerInterface $logger,)
    {
    }

    public function processEvent($event)
    {
        $this->logger->debug('Event received', ['event' => $event]);
        $this->processedEvents[] = ['event' => $event];
    }
}
