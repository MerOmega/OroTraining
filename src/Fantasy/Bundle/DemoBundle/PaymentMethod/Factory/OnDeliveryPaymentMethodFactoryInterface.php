<?php

namespace Fantasy\Bundle\DemoBundle\PaymentMethod\Factory;

use Fantasy\Bundle\DemoBundle\PaymentMethod\Config\OnDeliveryConfigInterface;
use Oro\Bundle\PaymentBundle\Method\PaymentMethodInterface;

interface OnDeliveryPaymentMethodFactoryInterface
{
    /**
     * @param OnDeliveryConfigInterface $config
     * @return PaymentMethodInterface
     */
    public function create(OnDeliveryConfigInterface $config);
}
