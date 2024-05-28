<?php

namespace Console\Command;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class WebGripCommand extends Command
{

    public function __construct(
        private LoggerInterface $logger,
        private ProductRepositoryInterface $productRepository,
        ?string $name = null
    ) {
        parent::__construct($name);
    }

    protected function configure(): void
    {
        $this->setName('webgrip:command');
        $this->setDescription('A Symfony command for WebGrip');
        $this->addArgument('required_product_id', InputArgument::REQUIRED, 'Required Product ID');
        $this->addArgument('product_id', InputArgument::OPTIONAL, 'Product ID', 1);

        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $productId = (int)$input->getArgument('product_id');
        $requiredProductId = (int)$input->getArgument('required_product_id');

        $requiredProduct = $this->productRepository->getById($requiredProductId);
        $requiredProduct->setName('test');

        $this->logger->debug('test');

        if ($productId) {
            $output->writeln('Product Name: ' . $this->productRepository->getById($productId)->getName());
        }

        $output->writeln('Required Product Name: ' . $this->productRepository->getById($requiredProductId)->getName());

        $output->writeln('Hello, WebGrip!');
        return Command::SUCCESS;
    }
}
