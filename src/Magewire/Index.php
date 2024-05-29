<?php

namespace WebGrip\ExampleModule\Magewire;

use Magewirephp\Magewire\Component;

class Index extends Component
{
    public function redirectToCounter()
    {
        $this->redirect('webgrip/counter');
    }

    public function redirectToProductFilter()
    {
        $this->redirect('webgrip/productfilter');
    }
}
