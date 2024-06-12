<?php

namespace Fantasy\Bundle\DemoBundle\PaymentMethod\View;

use Fantasy\Bundle\DemoBundle\PaymentMethod\Config\OnDeliveryConfigInterface;
use Oro\Bundle\PaymentBundle\Context\PaymentContextInterface;
use Oro\Bundle\PaymentBundle\Method\View\PaymentMethodViewInterface;
class OnDeliveryView implements PaymentMethodViewInterface
{
    /**
     * @var OnDeliveryConfigInterface
     */
    protected $config;

    public function __construct(OnDeliveryConfigInterface $config)
    {
        $this->config = $config;
    }

    /**
     * {@inheritdoc}
     */
    public function getOptions(PaymentContextInterface $context)
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getBlock()
    {
        return '_payment_methods_collect_on_delivery_widget';
    }

    /**
     * {@inheritdoc}
     */
    public function getLabel()
    {
        return $this->config->getLabel();
    }

    /**
     * {@inheritdoc}
     */
    public function getShortLabel()
    {
        return $this->config->getShortLabel();
    }

    /**
     * {@inheritdoc}
     */
    public function getAdminLabel()
    {
        return $this->config->getAdminLabel();
    }

    /** {@inheritdoc} */
    public function getPaymentMethodIdentifier()
    {
        return $this->config->getPaymentMethodIdentifier();
    }
}
