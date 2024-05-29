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

class EventEmitter extends  \Magewirephp\Magewire\Component
{
    public array $events = [
         'simple',
        'complex'
    ];

    public string $selectedEvent = 'simple';
    public string $eventData = '';

    public function __construct(
        private LoggerInterface $logger,
    ) {
    }

    //listenToEvent
    public function sendEvent()
    {
        $this->logger->debug('Event sent', ['event' => $this->selectedEvent, 'data' => $this->eventData]);
        $this->emit($this->selectedEvent, ['data' => $this->eventData]);
    }
}
