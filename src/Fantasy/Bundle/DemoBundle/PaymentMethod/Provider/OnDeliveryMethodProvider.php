<?php

namespace Fantasy\Bundle\DemoBundle\PaymentMethod\Provider;

use Fantasy\Bundle\DemoBundle\PaymentMethod\Config\OnDeliveryConfigInterface;
use Fantasy\Bundle\DemoBundle\PaymentMethod\Config\Provider\OnDeliveryConfigProviderInterface;
use Fantasy\Bundle\DemoBundle\PaymentMethod\Factory\OnDeliveryPaymentMethodFactoryInterface;
use Oro\Bundle\PaymentBundle\Method\Provider\AbstractPaymentMethodProvider;

/**
 * Provider for retrieving configured payment method instances
 */
class OnDeliveryMethodProvider extends AbstractPaymentMethodProvider
{

    public function __construct(
        protected OnDeliveryConfigProviderInterface $configProvider,
        private OnDeliveryPaymentMethodFactoryInterface $factory
    ) {
        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    protected function collectMethods()
    {
        $configs = $this->configProvider->getPaymentConfigs();
        foreach ($configs as $config) {
            $this->addOnDeliveryMethod($config);
        }
    }

    protected function addOnDeliveryMethod(OnDeliveryConfigInterface $config)
    {
        $this->addMethod(
            $config->getPaymentMethodIdentifier(),
            $this->factory->create($config)
        );
    }
}
