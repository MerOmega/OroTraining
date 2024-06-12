<?php

namespace Fantasy\Bundle\DemoBundle\Migrations\Schema;

use Doctrine\DBAL\Schema\Schema;
use Fantasy\Bundle\DemoBundle\Entity\DemoEntity;
use Oro\Bundle\MigrationBundle\Migration\Installation;
use Oro\Bundle\MigrationBundle\Migration\QueryBag;
use Oro\Bundle\EntityExtendBundle\Migration\Extension\ExtendExtension;
use Oro\Bundle\EntityExtendBundle\Migration\Extension\ExtendExtensionAwareInterface;
use Oro\Bundle\EntityExtendBundle\EntityConfig\ExtendScope;

/**
 * @SuppressWarnings(PHPMD.TooManyMethods)
 * @SuppressWarnings(PHPMD.ExcessiveClassLength)
 */
class FantasyDemoBundleInstaller implements Installation, ExtendExtensionAwareInterface
{
    /**
     * {@inheritdoc}
     */
    public function getMigrationVersion()
    {
        return 'v1_2';
    }

    public function setExtendExtension(ExtendExtension $extendExtension)
    {
        $this->extendExtension = $extendExtension;
    }

    /**
     * {@inheritdoc}
     */
    public function up(Schema $schema, QueryBag $queries)
    {
        /** Tables generation **/
        $this->createDemoEntityTable($schema);
        $this->createOnDelivTransLabelTable($schema);
        $this->createOnDelivShortLabelTable($schema);

        /** Foreign keys generation **/
        $this->addOnDelivTransLabelForeignKeys($schema);
        $this->addOnDelivShortLabelForeignKeys($schema);
    }

    /**
     * Create demo_entity table
     *
     * @param Schema $schema
     */
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

    /**
     * Create on_deliv_trans_label table
     *
     * @param Schema $schema
     */
    protected function createOnDelivTransLabelTable(Schema $schema)
    {
        $table = $schema->createTable('on_deliv_trans_label');
        $table->addColumn('transport_id', 'integer', []);
        $table->addColumn('localized_value_id', 'integer', []);
        $table->addIndex(['transport_id'], 'idx_294641ca9909c13f', []);
        $table->setPrimaryKey(['transport_id', 'localized_value_id']);
        $table->addUniqueIndex(['localized_value_id'], 'uniq_294641caeb576e89');
    }

    /**
     * Create on_deliv_short_label table
     *
     * @param Schema $schema
     */
    protected function createOnDelivShortLabelTable(Schema $schema)
    {
        $table = $schema->createTable('on_deliv_short_label');
        $table->addColumn('transport_id', 'integer', []);
        $table->addColumn('localized_value_id', 'integer', []);
        $table->addIndex(['transport_id'], 'idx_168084109909c13f', []);
        $table->addUniqueIndex(['localized_value_id'], 'uniq_16808410eb576e89');
        $table->setPrimaryKey(['transport_id', 'localized_value_id']);
    }

    /**
     * Add on_deliv_trans_label foreign keys.
     *
     * @param Schema $schema
     */
    protected function addOnDelivTransLabelForeignKeys(Schema $schema)
    {
        $table = $schema->getTable('on_deliv_trans_label');
        $table->addForeignKeyConstraint(
            $schema->getTable('oro_integration_transport'),
            ['transport_id'],
            ['id'],
            ['onUpdate' => null, 'onDelete' => 'CASCADE']
        );
        $table->addForeignKeyConstraint(
            $schema->getTable('oro_fallback_localization_val'),
            ['localized_value_id'],
            ['id'],
            ['onUpdate' => null, 'onDelete' => 'CASCADE']
        );
    }

    /**
     * Add on_deliv_short_label foreign keys.
     *
     * @param Schema $schema
     */
    protected function addOnDelivShortLabelForeignKeys(Schema $schema)
    {
        $table = $schema->getTable('on_deliv_short_label');
        $table->addForeignKeyConstraint(
            $schema->getTable('oro_integration_transport'),
            ['transport_id'],
            ['id'],
            ['onUpdate' => null, 'onDelete' => 'CASCADE']
        );
        $table->addForeignKeyConstraint(
            $schema->getTable('oro_fallback_localization_val'),
            ['localized_value_id'],
            ['id'],
            ['onUpdate' => null, 'onDelete' => 'CASCADE']
        );
    }
}
