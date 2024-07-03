<?php

namespace Fantasy\Bundle\DemoBundle\Migrations\Data\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Persistence\ObjectManager;
use Oro\Bundle\SecurityBundle\Acl\Persistence\AclManager;
use Oro\Bundle\UserBundle\Entity\Role;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadDemoRole extends AbstractFixture implements ContainerAwareInterface
{

    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null): void
    {
        $this->container = $container;
    }


    public function load(ObjectManager $manager): void
    {
        $demo_role = new Role(Role::PREFIX_ROLE . 'DEMO_TEST');
        $demo_role->setLabel('Just a test role');
        $this->addReference('demo_role', $demo_role);
        $manager->persist($demo_role);

        /** @var AclManager $aclManager */
        $aclManager = $this->getAclManager();
        $sId        = $aclManager->getSid(Role::PREFIX_ROLE . 'DEMO_TEST');
        $oId        = $aclManager->getOid('entity:Fantasy\Bundle\DemoBundle\Entity\DemoEntity');
        $builder    = $aclManager->getMaskBuilder($oId);
        $mask       = $builder->add('TEST_PERMISSION')->get();

        $aclManager->setPermission($sId, $oId, $mask);

        $aclManager->flush();
        $manager->flush();
    }

    private function getAclManager()
    {
        return $this->container->get('oro_security.acl.manager');
    }
}
