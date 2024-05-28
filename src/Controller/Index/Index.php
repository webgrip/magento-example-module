<?php

namespace WebGrip\ExampleModule\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\View\Result\PageFactory;

class Index implements ActionInterface
{
    public function __construct(
        private Context     $context,
        private PageFactory $pageFactory
    )
    {
    }

    public function execute()
    {
        return $this->pageFactory->create();
    }
}