<?php

namespace Fantasy\Bundle\DemoBundle\EventListener;

use Oro\Bundle\CustomerBundle\Entity\CustomerUser;
use Oro\Bundle\DataGridBundle\Datagrid\Common\DatagridConfiguration;
use Oro\Bundle\DataGridBundle\Event\BuildBefore;

class OrderHistoryListener
{
    public function onBuildBefore(BuildBefore $event)
    {
        $config = $event->getConfig();
        $this->setColumnOrders($config);
        $this->createCustomerUserBlock($config);
    }

    /**
     * Creates the customer_user block in the datagrid to display the customer user who
     * made the purchase.
     *
     * @param DatagridConfiguration $config
     * @return void
     */
    public function createCustomerUserBlock(DatagridConfiguration $config): void
    {
        // Add the customer_user column
        $config->addColumn('customer_user', [
            'label'         => 'Purchased by',
            'type'          => 'twig',
            'template'      => '@FantasyDemo/Order/Datagrid/customer_user.html.twig',
            'frontend_type' => 'html',
            'renderable'    => true,
            'order'         => 25
        ]);

        $query = $config->getOrmQuery();
        $query->addLeftJoin(
            CustomerUser::class,
            'customer_user',
            'WITH',
            'customer_user.id = order1.customerUser'
        );
        $query->addSelect('customer_user.firstName as customerUserFirstName, customer_user.lastName as customerUserLastName');
    }

    /**
     * Alternative to the grid merge in the datagrid.yml file. This method sets the order dynamically with a step of 10.
     *
     * @param DatagridConfiguration $config
     * @return void
     */
    public function setColumnOrders(DatagridConfiguration $config): void
    {
        $columns            = $config->offsetGetByPath('[columns]');
        $initialColumnOrder = 10;
        foreach ($columns as $columnName => $column) {
            $columns[$columnName]['order'] = $initialColumnOrder;
            $initialColumnOrder            += 10;
        }
        $config->offsetSetByPath('[columns]', $columns);
    }
}
