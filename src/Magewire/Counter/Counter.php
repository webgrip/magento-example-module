<?php

namespace WebGrip\ExampleModule\Magewire\Counter;

use Magewirephp\Magewire\Component;

class Counter extends Component
{
    public int $count = 100;

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        $this->count--;
    }
}
