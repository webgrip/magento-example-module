<?php

namespace WebGrip\ExampleModule\Model;

use Magento\Framework\Model\AbstractModel;
use WebGrip\ExampleModule\Model\ExampleItem\ExampleItemResourceModel;

class ExampleItem extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(ExampleItemResourceModel::class);
    }

}
