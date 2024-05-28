<?php declare(strict_types=1);

namespace WebGrip\ExampleModule\Controller\Forwarding;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\ForwardFactory;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\View\Result\PageFactory;

class Index implements HttpGetActionInterface
{
    public function __construct(private ForwardFactory $forwardFactory)
    {
    }

    public function execute()
    {
        $page = $this->forwardFactory->create()
            ->setModule('webgrip_examplemodule')
            ->setController('example')
            ->forward('index');

        return $page;
    }
}
