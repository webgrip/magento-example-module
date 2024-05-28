<?php

namespace WebGrip\ExampleModule\Magewire\Clicks;

use Magewirephp\Magewire\Component;

class Clicks extends Component
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
