<?php

namespace Fantasy\Bundle\DemoBundle\Migrations\Data\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Persistence\ObjectManager;
use Oro\Bundle\EntityExtendBundle\Entity\Repository\EnumValueRepository;
use Oro\Bundle\EntityExtendBundle\Tools\ExtendHelper;

class LoadDemoEnumData extends AbstractFixture
{
    protected array $data
        = [
            'web'   => true,
            'local' => false,
            'dual'  => false,
        ];

    /**
     * @inheritDoc
     */
    public function load(ObjectManager $manager): void
    {
        $className = ExtendHelper::buildEnumValueClassName('type_data');

        /** @var EnumValueRepository $enumRepo */
        $enumRepo = $manager->getRepository($className);

        $priority = 1;
        foreach ($this->data as $name => $isDefault) {
            $enumOption = $enumRepo->createEnumValue($name, $priority++, $isDefault);
            $manager->persist($enumOption);
        }

        $manager->flush();
    }
}
