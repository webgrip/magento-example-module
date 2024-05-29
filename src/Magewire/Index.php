<?php

namespace WebGrip\ExampleModule\Magewire;

use Magewirephp\Magewire\Component;

class Index extends Component
{
    public function redirectToCounter()
    {
        $this->redirect('webgrip/counter');
    }

    public function redirectToProducts()
    {
        $this->redirect('webgrip/products');
    }
}
