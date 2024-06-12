<?php

namespace Fantasy\Bundle\DemoBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use Fantasy\Bundle\DemoBundle\Entity\OnDeliverySettings;

class OnDeliverySettingsRepository extends EntityRepository
{
    /**
     * @return OnDeliverySettings[]
     */
    public function getEnabledSettings(): array
    {
        return $this->createQueryBuilder('settings')
            ->innerJoin('settings.channel', 'channel')
            ->andWhere('channel.enabled = true')
            ->getQuery()
            ->getResult();
    }
}
