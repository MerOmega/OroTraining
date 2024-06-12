<?php

namespace Fantasy\Bundle\DemoBundle\PaymentMethod\Config\Provider;

use Fantasy\Bundle\DemoBundle\PaymentMethod\Config\OnDeliveryConfigInterface;

interface OnDeliveryConfigProviderInterface
{
    /**
     * @return OnDeliveryConfigInterface[]
     */
    public function getPaymentConfigs();

    /**
     * @param string $identifier
     * @return OnDeliveryConfigInterface|null
     */
    public function getPaymentConfig($identifier);

    /**
     * @param string $identifier
     * @return bool
     */
    public function hasPaymentConfig($identifier);
}
