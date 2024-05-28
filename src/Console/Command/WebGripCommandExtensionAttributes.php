<?php

namespace WebGrip\ExampleModule\Console\Command;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class WebGripCommandExtensionAttributes extends Command
{

    public function __construct(
        private ProductRepositoryInterface $productRepository,
        ?string $name = null
    ) {
        parent::__construct($name);
    }

    protected function configure(): void
    {
        $this->setName('webgrip:extension-attributes');
        $this->setDescription('A Symfony command for WebGrip');
        $this->addArgument('required_product_id', InputArgument::REQUIRED, 'Required Product ID');

        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $productId = (int)$input->getArgument('product_id');
        $product = $this->productRepository->getById($productId);

        $output->writeln('Product ID: ' . $product->getExtensionAttributes()->getList());
        return Command::SUCCESS;
    }
}
