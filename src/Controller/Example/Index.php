<?php declare(strict_types=1);

namespace WebGrip\ExampleModule\Controller\Example;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\ForwardFactory;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\View\Result\PageFactory;

class Index implements HttpGetActionInterface
{
    public function __construct(
        private ForwardFactory $forwardFactory,
        private PageFactory $pageFactory,
        private JsonFactory $jsonFactory
    ) {
    }

    public function execute()
    {
        $page = $this->pageFactory->create();

        $page->getConfig()->getTitle()->set('WebGrip - V1');

        return $page;
    }
}
