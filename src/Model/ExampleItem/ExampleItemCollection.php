<?php declare(strict_types=1);

namespace WebGrip\ExampleModule\Model\ExampleItem;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Model\ExampleItem\ExampleItem;
use Model\ExampleItem\ExampleItemResourceModel;

class
ExampleItemCollection extends AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'webgrip_examplemodule_exampleitem_collection';
    protected $_eventObject = 'exampleitem_collection';

    protected function _construct()
    {
        $this->_init(
            ExampleItem::class,
            ExampleItemResourceModel::class
        );
    }

}
