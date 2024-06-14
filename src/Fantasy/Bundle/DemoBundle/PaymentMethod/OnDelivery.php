<?php

namespace Fantasy\Bundle\DemoBundle\PaymentMethod;

use Fantasy\Bundle\DemoBundle\PaymentMethod\Config\OnDeliveryConfigInterface;
use Oro\Bundle\PaymentBundle\Context\PaymentContextInterface;
use Oro\Bundle\PaymentBundle\Entity\PaymentTransaction;
use Oro\Bundle\PaymentBundle\Method\PaymentMethodInterface;

class OnDelivery implements PaymentMethodInterface
{

    public function __construct(private OnDeliveryConfigInterface $config)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function execute($action, PaymentTransaction $paymentTransaction)
    {
        if ($action === self::PURCHASE) {
            $paymentTransaction->setAction(PaymentMethodInterface::PURCHASE);
        } elseif ($action === self::CHARGE) {
            $paymentTransaction->setAction(PaymentMethodInterface::CHARGE);
        }

        $paymentTransaction->setActive(true);
        $paymentTransaction->setSuccessful(true);

        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getIdentifier()
    {
        return $this->config->getPaymentMethodIdentifier();
    }

    /**
     * {@inheritdoc}
     */
    public function isApplicable(PaymentContextInterface $context)
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function supports($actionName)
    {
        return in_array($actionName, [self::PURCHASE, self::CHARGE]);
    }
}
