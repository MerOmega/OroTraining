<?php

namespace Fantasy\Bundle\DemoBundle\PaymentMethod\Config\Factory;

use Fantasy\Bundle\DemoBundle\Entity\OnDeliverySettings;
use Fantasy\Bundle\DemoBundle\PaymentMethod\Config\OnDeliveryConfig;
use Doctrine\Common\Collections\Collection;
use Oro\Bundle\IntegrationBundle\Generator\IntegrationIdentifierGeneratorInterface;
use Oro\Bundle\LocaleBundle\Helper\LocalizationHelper;

class OnDeliveryConfigFactory implements OnDeliveryConfigFactoryInterface
{
    public function __construct(
        private readonly LocalizationHelper                      $localizationHelper,
        private readonly IntegrationIdentifierGeneratorInterface $identifierGenerator
    )
    {
    }

    /**
     * {@inheritDoc}
     */
    public function create(OnDeliverySettings $settings)
    {
        $params  = [];
        $channel = $settings->getChannel();

        $params[OnDeliveryConfig::FIELD_LABEL]       = $this->getLocalizedValue($settings->getLabels());
        $params[OnDeliveryConfig::FIELD_SHORT_LABEL] = $this->getLocalizedValue($settings->getShortLabels());
        $params[OnDeliveryConfig::FIELD_ADMIN_LABEL] = $channel->getName();
        $params[OnDeliveryConfig::FIELD_PAYMENT_METHOD_IDENTIFIER]
                                                     = $this->identifierGenerator->generateIdentifier($channel);

        return new OnDeliveryConfig($params);
    }

    /**
     * @param Collection $values
     *
     * @return string
     */
    private function getLocalizedValue(Collection $values)
    {
        return (string)$this->localizationHelper->getLocalizedValue($values);
    }
}
