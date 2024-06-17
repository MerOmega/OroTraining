<?php

namespace Fantasy\Bundle\DemoBundle\EventListener;

use Doctrine\ORM\Event\PreUpdateEventArgs;

use Fantasy\Bundle\DemoBundle\PaymentMethod\OnDelivery;
use Oro\Bundle\EntityBundle\ORM\DoctrineHelper;
use Oro\Bundle\OrderBundle\Entity\Order;
use Oro\Bundle\PaymentBundle\Entity\PaymentTransaction;
use Oro\Bundle\PaymentBundle\Entity\Repository\PaymentTransactionRepository;
use Oro\Bundle\PaymentBundle\Method\Provider\PaymentMethodProviderInterface;
use Oro\Bundle\PaymentBundle\Provider\PaymentTransactionProvider;

class OnDeliveryOrderListener
{
    protected array $orders = [];

    public function __construct(
        private readonly DoctrineHelper                 $doctrineHelper,
        private readonly PaymentMethodProviderInterface $paymentMethodProvider,
        private readonly PaymentTransactionProvider     $paymentTransactionProvider
    )
    {
    }


    /**
     * It checks if the order status has changed and if it has, it checks if the order has a payment transaction
     *
     * @param Order $order
     * @param PreUpdateEventArgs $event
     * @return void
     */
    public function preUpdate(Order $order, PreUpdateEventArgs $event): void
    {
        $orderStatus = $order->getInternalStatus()->getId();
        $changeSet   = $event->getEntityChangeSet();

        if (!isset($changeSet['internal_status']))
            return;

        if ($this->sameState($orderStatus, $changeSet['internal_status'])) {
            return;
        }

        /** @var PaymentTransactionRepository $repository */
        $repository = $this->doctrineHelper->getEntityRepositoryForClass(PaymentTransaction::class);

        /** @var PaymentTransaction $authorizePaymentTransaction */
        $authorizePaymentTransaction = $repository->findOneBy([
            'entityClass'      => 'Oro\Bundle\OrderBundle\Entity\Order',
            'entityIdentifier' => $order->getId(),
            'action'           => OnDelivery::PURCHASE,
            'active'           => true,
            'successful'       => true
        ]);

        if ($authorizePaymentTransaction instanceof PaymentTransaction) {
            $paymentMethodId = $authorizePaymentTransaction->getPaymentMethod();
            if ($this->paymentMethodProvider->hasPaymentMethod($paymentMethodId)) {
                $this->orders[] = $order;
            }
        }
    }

    private function sameState(string $orderStatus, array $previousStatus): bool
    {
        if (isset($previousStatus[0]) && $orderStatus === 'shipped') {
            return $previousStatus[0]->getId() === $orderStatus;
        }
        return false;
    }

    public function doCharge(Order $order): void
    {
        /** @var PaymentTransactionRepository $repository */
        $repository = $this->doctrineHelper->getEntityRepositoryForClass(PaymentTransaction::class);
        /** @var PaymentTransaction $authorizePaymentTransaction */
        $authorizePaymentTransaction = $repository->findOneBy([
            'entityClass' => 'Oro\Bundle\OrderBundle\Entity\Order',
            'entityIdentifier' => $order->getId(),
            'action' => OnDelivery::PURCHASE,
            'active' => true,
            'successful' => true
        ]);

        $authorizePaymentTransaction->setAmount(intval($order->getTotal()));
        $paymentMethod = $this->paymentMethodProvider
            ->getPaymentMethod($authorizePaymentTransaction->getPaymentMethod());

        $chargePaymentTransaction = $this->paymentTransactionProvider
            ->createPaymentTransactionByParentTransaction(
                OnDelivery::CHARGE,
                $authorizePaymentTransaction
            );
        $paymentMethod->execute(OnDelivery::CHARGE, $chargePaymentTransaction);
        $this->paymentTransactionProvider->savePaymentTransaction($chargePaymentTransaction);
        $this->paymentTransactionProvider->savePaymentTransaction($authorizePaymentTransaction);
    }


    public function postFlush(): void
    {
        if (!empty($this->orders)) {
            $change = $this->orders;
            $this->orders = [];
            array_walk($change, [$this, 'doCharge']);
        }
    }
}
