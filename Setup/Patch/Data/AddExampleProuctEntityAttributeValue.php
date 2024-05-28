<?php declare(strict_types=1);

namespace Setup\Patch\Data;

use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\App\ResourceConnection;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class AddExampleProuctEntityAttributeValue implements DataPatchInterface
{

    public function __construct(
        private ResourceConnection $resourceConnection,
        private EavSetupFactory $eavSetupFactory
    ) {
    }

    public static function getDependencies()
    {
        return [];
    }

    public function getAliases()
    {
        return [];
    }

    public function apply()
    {
        $eaSetup = $this->eavSetupFactory->create();
        $eaSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'example_attribute',
            [
                'type' => 'varchar',
                'label' => 'Example Attribute',
                'input' => 'text',
                'required' => false,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'user_defined' => true,
                'searchable' => true,
                'filterable' => true,
                'comparable' => true,
                'visible_on_front' => true,
                'used_in_product_listing' => true,
                'unique' => false,
                'apply_to' => ''
            ]
        );

        $connection = $this->resourceConnection->getConnection(); // Should be repository
        $connection->startSetup();
        $connection->insert(
            'example_items',
            [
                'name' => 'Example Item',
                'description' => 'This is an example item',
                'price' => 10.00
            ]
        );

        return $this;
    }
}
