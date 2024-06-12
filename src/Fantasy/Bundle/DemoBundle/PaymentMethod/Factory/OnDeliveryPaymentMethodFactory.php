<?php

namespace Fantasy\Bundle\DemoBundle\PaymentMethod\Factory;

use Fantasy\Bundle\DemoBundle\PaymentMethod\OnDelivery;
use Fantasy\Bundle\DemoBundle\PaymentMethod\Config\OnDeliveryConfigInterface;

class OnDeliveryPaymentMethodFactory implements OnDeliveryPaymentMethodFactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function create(OnDeliveryConfigInterface $config)
    {
        return new OnDelivery($config);
    }
}
