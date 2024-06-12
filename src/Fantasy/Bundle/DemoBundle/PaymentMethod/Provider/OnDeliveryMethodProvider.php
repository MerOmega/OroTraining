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
    /**
     * @var OnDeliveryPaymentMethodFactoryInterface
     */
    protected $factory;

    /**
     * @var OnDeliveryConfigProviderInterface
     */
    private $configProvider;

    public function __construct(
        OnDeliveryConfigProviderInterface $configProvider,
        OnDeliveryPaymentMethodFactoryInterface $factory
    ) {
        parent::__construct();

        $this->configProvider = $configProvider;
        $this->factory = $factory;
    }

    /**
     * {@inheritdoc}
     */
    protected function collectMethods()
    {
        $configs = $this->configProvider->getPaymentConfigs();
        foreach ($configs as $config) {
            $this->addCollectOnDeliveryMethod($config);
        }
    }

    protected function addCollectOnDeliveryMethod(OnDeliveryConfigInterface $config)
    {
        $this->addMethod(
            $config->getPaymentMethodIdentifier(),
            $this->factory->create($config)
        );
    }
}
