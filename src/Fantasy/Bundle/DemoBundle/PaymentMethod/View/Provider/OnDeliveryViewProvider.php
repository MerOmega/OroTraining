<?php

namespace Fantasy\Bundle\DemoBundle\PaymentMethod\View\Provider;

use Fantasy\Bundle\DemoBundle\PaymentMethod\Config\OnDeliveryConfigInterface;
use Fantasy\Bundle\DemoBundle\PaymentMethod\Config\Provider\OnDeliveryConfigProviderInterface;
use Fantasy\Bundle\DemoBundle\PaymentMethod\View\Factory\OnDeliveryViewFactoryInterface;
use Oro\Bundle\PaymentBundle\Method\View\AbstractPaymentMethodViewProvider;

/**
 * Provider for retrieving payment method view instances
 */
class OnDeliveryViewProvider extends AbstractPaymentMethodViewProvider
{
    public function __construct(
        private readonly OnDeliveryConfigProviderInterface $configProvider,
        private readonly OnDeliveryViewFactoryInterface $factory
    )
    {
        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    protected function buildViews()
    {
        $configs = $this->configProvider->getPaymentConfigs();
        foreach ($configs as $config) {
            $this->addOnDeliveryView($config);
        }
    }

    protected function addOnDeliveryView(OnDeliveryConfigInterface $config)
    {
        $this->addView(
            $config->getPaymentMethodIdentifier(),
            $this->factory->create($config)
        );
    }
}
