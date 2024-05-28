<?php

namespace Model\ExampleItem;

use Magento\Framework\Model\AbstractModel;
use Model\ExampleItem\ExampleItemResourceModel;

class ExampleItem extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(ExampleItemResourceModel::class);
    }

}
