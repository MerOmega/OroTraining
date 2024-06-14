<?php

namespace Fantasy\Bundle\DemoBundle\EventListener;

use Doctrine\ORM\Event\PreUpdateEventArgs;
use Doctrine\Persistence\ManagerRegistry;
use Fantasy\Bundle\DemoBundle\PaymentMethod\Config\Provider\OnDeliveryConfigProvider;
use Oro\Bundle\EntityBundle\ORM\DoctrineHelper;
use Oro\Bundle\OrderBundle\Entity\Order;
use Oro\Bundle\PaymentBundle\Entity\PaymentTransaction;
use Fantasy\Bundle\DemoBundle\PaymentMethod\OnDelivery;

class OnDeliveryOrderListener
{

    public function __construct(
        private readonly ManagerRegistry          $doctrine,
        private readonly DoctrineHelper           $doctrineHelper,
        private readonly OnDeliveryConfigProvider $configProvider,
    )
    {
    }


    /**
     * TODO If this is correct needs to be optimized
     *
     * Before the update checks if its an Order, if its checks that the internal status is shipped and the payment method is OnDelivery
     * If it is, it sets the action to charge
     *
     * @param PreUpdateEventArgs $event
     * @return void
     */
    public function preUpdate(PreUpdateEventArgs $event)
    {
        $entity = $event->getObject();

        if (!$entity instanceof Order) {
            return;
        }

        $paymentRepository = $this->doctrineHelper->getEntityRepository(PaymentTransaction::class);
        $paymentMethod     = $paymentRepository->getPaymentMethods(Order::class, [$entity->getId()]);

        if (!isset($paymentMethod[$entity->getId()]) || !isset($paymentMethod[$entity->getId()][0])) {
            return;
        }
        $transactionType = $paymentMethod[$entity->getId()][0];
        $changeSet       = $event->getEntityChangeSet();
        $paymentConfig   = $this->configProvider->getPaymentConfig($transactionType);

        if (isset($changeSet['internal_status'][1]) && $changeSet['internal_status'][1]->getId() === 'shipped' && $paymentConfig != null) {
            $paymentTransaction = $paymentRepository->find($entity->getId());
            $paymentTransaction->setAction(OnDelivery::CHARGE);
            $this->doctrine->getManager()->persist($paymentTransaction);
            $this->doctrine->getManager()->flush();
        }
    }
}
