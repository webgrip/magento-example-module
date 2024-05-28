<?php

namespace WebGrip\ExampleModule\Magewire\Counter;

use Magewirephp\Magewire\Component;

class Counter extends Component
{
    public int $count = 100;

    public function increment()
    {
        $this->dispatchSuccessMessage('Incremented by 1!');
        $this->count++;
    }

    public function decrement()
    {
        $this->dispatchWarningMessage('Incremented by 1!');
        $this->count--;
    }
}
