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
    /** @var OnDeliveryViewFactoryInterface */
    private $factory;

    /** @var OnDeliveryConfigProviderInterface */
    private $configProvider;

    public function __construct(
        OnDeliveryConfigProviderInterface $configProvider,
        OnDeliveryViewFactoryInterface    $factory
    )
    {
        $this->factory        = $factory;
        $this->configProvider = $configProvider;

        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    protected function buildViews()
    {
        $configs = $this->configProvider->getPaymentConfigs();
        foreach ($configs as $config) {
            $this->addCollectOnDeliveryView($config);
        }
    }

    protected function addCollectOnDeliveryView(OnDeliveryConfigInterface $config)
    {
        $this->addView(
            $config->getPaymentMethodIdentifier(),
            $this->factory->create($config)
        );
    }
}
