<?php

namespace WebGrip\ExampleModule\Magewire\Counter;

use Magewirephp\Magewire\Component;

class Counter extends Component
{
    public int $count = 0;

    function increment(): void
    {
        $this->count++;
    }

    function updatedCount(string $value)
    {
        $this->count = (int) $value++;
    }
}
