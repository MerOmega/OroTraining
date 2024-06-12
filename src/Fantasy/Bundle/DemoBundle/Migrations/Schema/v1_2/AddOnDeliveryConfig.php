<?php

namespace Fantasy\Bundle\DemoBundle\Migrations\Schema\v1_2;

use Oro\Bundle\MigrationBundle\Migration\Migration;
use Doctrine\DBAL\Schema\Schema;
use Oro\Bundle\MigrationBundle\Migration\QueryBag;


class AddOnDeliveryConfig implements Migration
{

    public function up(Schema $schema, QueryBag $queries)
    {
        /** Tables generation **/
        $this->createOnDelivTransLabelTable($schema);
        $this->createOnDelivShortLabelTable($schema);

        /** Foreign keys generation **/
        $this->addOnDelivTransLabelForeignKeys($schema);
        $this->addOnDelivShortLabelForeignKeys($schema);
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
