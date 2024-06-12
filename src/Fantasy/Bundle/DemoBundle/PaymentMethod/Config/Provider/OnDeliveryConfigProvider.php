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
    /**
     * @var ManagerRegistry
     */
    protected $doctrine;

    /**
     * @var OnDeliveryConfigFactoryInterface
     */
    protected $configFactory;

    /**
     * @var OnDeliveryConfigInterface[]
     */
    protected $configs;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    public function __construct(
        ManagerRegistry $doctrine,
        LoggerInterface $logger,
        OnDeliveryConfigFactoryInterface $configFactory
    ) {
        $this->doctrine = $doctrine;
        $this->logger = $logger;
        $this->configFactory = $configFactory;
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
