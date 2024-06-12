<?php

namespace Fantasy\Bundle\DemoBundle\PaymentMethod\View\Factory;

use Fantasy\Bundle\DemoBundle\PaymentMethod\Config\OnDeliveryConfigInterface;
use Fantasy\Bundle\DemoBundle\PaymentMethod\View\OnDeliveryView;

class OnDeliveryViewFactory implements OnDeliveryViewFactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function create(OnDeliveryConfigInterface $config)
    {
        return new OnDeliveryView($config);
    }
}
