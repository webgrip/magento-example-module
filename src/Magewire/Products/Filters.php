<?php

declare(strict_types=1);

namespace WebGrip\ExampleModule\Magewire\Products;

use Magento\Catalog\Model\Product\Attribute\Repository as AttributeRepository;
use Magewirephp\Magewire\Component;
use function WebGrip\ExampleModule\Magewire\__;

class Filters extends Component
{
    public $colors = [];
    public $sizes = [];

    public $color;
    public $size;

    public function __construct(private AttributeRepository $attributeRepository)
    {
    }

    public function mount(): void
    {
        $this->colors = $this->getOptions('color');
        $this->sizes = $this->getOptions('size');
    }

    public function updated(string $value, string $prop)
    {
        $this->emit('filter' . $prop, $value);
        return $value;
    }

    private function getOptions($attributCode): array
    {
        $options[] = [
            'value' => '',
            'label' => __('Please choose a ' . $attributCode . '...')
        ];
        $optionValues = $this->attributeRepository->get($attributCode)->getOptions();
        array_shift($optionValues);
        foreach ($optionValues as $option) {
            $options[] = [
                'value' => $option->getValue(),
                'label' => $option->getLabel()
            ];
        }
        return $options;
    }
}