<?php

namespace Fantasy\Bundle\DemoBundle\Migrations\Schema;

use Doctrine\DBAL\Schema\Schema;
use Fantasy\Bundle\DemoBundle\Entity\DemoEntity;
use Oro\Bundle\EntityExtendBundle\Migration\Extension\ExtendExtension;
use Oro\Bundle\EntityExtendBundle\Migration\Extension\ExtendExtensionAwareInterface;
use Oro\Bundle\EntityExtendBundle\EntityConfig\ExtendScope;
use Oro\Bundle\MigrationBundle\Migration\Installation;
use Oro\Bundle\MigrationBundle\Migration\QueryBag;

/**
 * @SuppressWarnings(PHPMD.TooManyMethods)
 * @SuppressWarnings(PHPMD.ExcessiveClassLength)
 */
class FantasyDemoBundleInstaller implements Installation, ExtendExtensionAwareInterface
{

    protected ExtendExtension $extendExtension;

    /**
     * {@inheritdoc}
     */
    public function getMigrationVersion()
    {
        return 'v1_1';
    }

    /**
     * {@inheritdoc}
     */
    public function up(Schema $schema, QueryBag $queries)
    {
        $this->createDemoEntityTable($schema);
    }

    private function createDemoEntityTable(Schema $schema): void
    {
        $table = $schema->createTable('demo_entity');
        $table->addColumn('id', 'integer', ['autoincrement' => true]);
        $table->addColumn('name', 'string', ['length' => 250]);
        $table->addColumn('description', 'string', ['length' => 200]);
        $table->setPrimaryKey(['id']);

        $this->extendExtension->addEnumField(
            $schema,
            $table,
            'type',
            DemoEntity::ENUM_CODE_TYPE,
            false,
            false,
            [
                'extend' => ['owner' => ExtendScope::OWNER_CUSTOM],
                'entity' => ['label' => 'Type']
            ]
        );
    }

    public function setExtendExtension(ExtendExtension $extendExtension)
    {
        $this->extendExtension = $extendExtension;
    }
}
