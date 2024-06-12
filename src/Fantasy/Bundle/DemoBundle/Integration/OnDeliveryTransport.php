<?php

namespace Fantasy\Bundle\DemoBundle\Integration;

use Fantasy\Bundle\DemoBundle\Entity\OnDeliverySettings;
use Fantasy\Bundle\DemoBundle\Form\Type\OnDeliverySettingsType;
use Oro\Bundle\IntegrationBundle\Entity\Transport;
use Oro\Bundle\IntegrationBundle\Provider\TransportInterface;

class OnDeliveryTransport implements TransportInterface
{
    /**
     * {@inheritdoc}
     */
    public function init(Transport $transportEntity)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getLabel(): string
    {
        return 'fantasy.on_delivery.settings.transport.label';
    }

    /**
     * {@inheritdoc}
     */
    public function getSettingsFormType(): string
    {
        return OnDeliverySettingsType::class;
    }

    /**
     * {@inheritdoc}
     */
    public function getSettingsEntityFQCN(): string
    {
        return OnDeliverySettings::class;
    }
}
