<?php

namespace Fantasy\Bundle\DemoBundle\Integration;

use Oro\Bundle\IntegrationBundle\Provider\ChannelInterface;
use Oro\Bundle\IntegrationBundle\Provider\IconAwareIntegrationInterface;

class OnDeliveryChannelType implements ChannelInterface, IconAwareIntegrationInterface
{

    const TYPE = 'on_delivery';

    /**
     * {@inheritdoc}
     */
    public function getLabel(): string
    {
        return 'fantasy.on_delivery.channel_type.label';
    }

    /**
     * {@inheritdoc}
     */
    public function getIcon(): string
    {
        return 'bundles/oromoneyorder/img/money-order-icon.png';
    }
}
