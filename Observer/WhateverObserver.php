<?php declare(strict_types=1);

namespace  WebGrip\ExampleModule\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class WhateverObserver implements ObserverInterface
{
    public function __construct(private \Psr\Log\LoggerInterface $logger)
    {
    }

    public function execute(Observer $observer)
    {
        $event = $observer->getEvent();
        $this->logger->info($event->getName(), $event->getData());
    }
}
