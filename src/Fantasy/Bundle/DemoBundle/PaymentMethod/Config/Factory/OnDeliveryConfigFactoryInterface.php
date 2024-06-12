<?php

namespace Fantasy\Bundle\DemoBundle\PaymentMethod\Config\Factory;

use Fantasy\Bundle\DemoBundle\Entity\OnDeliverySettings;
use Fantasy\Bundle\DemoBundle\PaymentMethod\Config\OnDeliveryConfigInterface;

interface OnDeliveryConfigFactoryInterface
{
    /**
     * @param OnDeliverySettings $settings
     * @return OnDeliveryConfigInterface
     */
    public function create(OnDeliverySettings $settings);
}
