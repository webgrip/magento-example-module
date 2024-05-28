<?php declare(strict_types=1);

namespace Setup\Patch\Data;

use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\App\ResourceConnection;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class AddExampleProuctAttribute implements DataPatchInterface
{

    public function __construct(
        private ResourceConnection $resourceConnection
    )
    {
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
