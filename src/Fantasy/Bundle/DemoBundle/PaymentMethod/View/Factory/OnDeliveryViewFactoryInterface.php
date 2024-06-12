<?php

namespace Fantasy\Bundle\DemoBundle\PaymentMethod\View\Factory;

use Fantasy\Bundle\DemoBundle\PaymentMethod\Config\OnDeliveryConfigInterface;
use Oro\Bundle\PaymentBundle\Method\View\PaymentMethodViewInterface;

interface OnDeliveryViewFactoryInterface
{
    /**
     * @param OnDeliveryConfigInterface $config
     * @return PaymentMethodViewInterface
     */
    public function create(OnDeliveryConfigInterface $config);
}
