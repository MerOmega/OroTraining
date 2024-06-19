<?php

namespace Fantasy\Bundle\DemoBundle\PaymentMethod\Config\Provider;

use Doctrine\Persistence\ManagerRegistry;
use Fantasy\Bundle\DemoBundle\Entity\OnDeliverySettings;
use Fantasy\Bundle\DemoBundle\Entity\Repository\OnDeliverySettingsRepository;
use Fantasy\Bundle\DemoBundle\PaymentMethod\Config\Factory\OnDeliveryConfigFactoryInterface;
use Fantasy\Bundle\DemoBundle\PaymentMethod\Config\OnDeliveryConfigInterface;
use Psr\Log\LoggerInterface;

class OnDeliveryConfigProvider implements OnDeliveryConfigProviderInterface
{
    public function __construct(
        protected ManagerRegistry $doctrine,
        protected LoggerInterface $logger,
        protected OnDeliveryConfigFactoryInterface $configFactory
    ) {
    }

    /**
     * {@inheritDoc}
     */
    public function getPaymentConfigs()
    {
        $configs = [];

        $settings = $this->getEnabledIntegrationSettings();

        foreach ($settings as $setting) {
            $config = $this->configFactory->create($setting);

            $configs[$config->getPaymentMethodIdentifier()] = $config;
        }

        return $configs;
    }

    /**
     * {@inheritDoc}
     */
    public function getPaymentConfig($identifier)
    {
        $paymentConfigs = $this->getPaymentConfigs();

        if ([] === $paymentConfigs || false === array_key_exists($identifier, $paymentConfigs)) {
            return null;
        }

        return $paymentConfigs[$identifier];
    }

    /**
     * {@inheritDoc}
     */
    public function hasPaymentConfig($identifier)
    {
        return null !== $this->getPaymentConfig($identifier);
    }

    /**
     * @return OnDeliverySettings[]
     */
    protected function getEnabledIntegrationSettings()
    {
        try {
            /** @var OnDeliverySettingsRepository $repository */
            $repository = $this->doctrine
                ->getManagerForClass(OnDeliverySettings::class)
                ->getRepository(OnDeliverySettings::class);

            return $repository->getEnabledSettings();
        } catch (\UnexpectedValueException $e) {
            $this->logger->critical($e->getMessage());

            return [];
        }
    }
}
