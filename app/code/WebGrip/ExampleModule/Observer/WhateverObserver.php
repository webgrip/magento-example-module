<?php declare(strict_types=1);

use Magento\Framework\Event\Observer;

class WhateverObserver
{
    public function __construct(private \Psr\Log\LoggerInterface $logger)
    {
    }

    public function execute(Observer $observer)
    {
        $event = $observer->getEvent();
        $this->logger->info($event->getName(), json_encode($event->getData()));
    }
}
