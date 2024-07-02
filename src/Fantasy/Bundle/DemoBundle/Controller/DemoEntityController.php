<?php

namespace Fantasy\Bundle\DemoBundle\Controller;

use Fantasy\Bundle\DemoBundle\Entity\DemoEntity;
use Fantasy\Bundle\DemoBundle\Form\Type\DemoType;
use Oro\Bundle\FormBundle\Model\UpdateHandlerFacade;
use Oro\Bundle\SecurityBundle\Annotation\Acl;
use Oro\Bundle\SecurityBundle\Annotation\AclAncestor;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * Crud controller for DemoEntity entity
 * @Route(name="demo_")
 */
class DemoEntityController extends AbstractController
{

    /**
     * @Route("/", name="index")
     * @Template("@FantasyDemo/DemoEntity/index.html.twig")
     * @AclAncestor("demo_view")
     */
    public function indexAction(): array
    {
        return [
            'entity_class' => DemoEntity::class
        ];
    }

    /**
     * @Route("/view/{id}", name="view", requirements={"id"="\d+"})
     * @Template("@FantasyDemo/DemoEntity/index.html.twig")
     * @Acl(
     *       id="demo_view",
     *       type="entity",
     *       class="Fantasy\Bundle\DemoBundle\Entity\DemoEntity",
     *       permission="VIEW"
     *  )
     */
    public function viewAction(DemoEntity $entity): array
    {
        return [
            'entity' => $entity,
        ];
    }

    /**
     * Create Demo
     *
     * @Route("/create", name="create", options={"expose"=true})
     * @Template("@FantasyDemo/DemoEntity/update.html.twig")
     * @Acl(
     *        id="demo_create",
     *        type="entity",
     *        class="Fantasy\Bundle\DemoBundle\Entity\DemoEntity",
     *        permission="CREATE"
     *   )
     */
    public function createAction(Request $request): RedirectResponse|array
    {
        $createMessage = "Created!";

        return $this->update(new DemoEntity(), $request, $createMessage);
    }

    /**
     * Edit Demo Entity form
     *
     * @Route("/update/{id}", name="update", requirements={"id"="\d+"})
     * @Template("@FantasyDemo/DemoEntity/update.html.twig")
     * @Acl(
     *        id="demo_update",
     *        type="entity",
     *        class="Fantasy\Bundle\DemoBundle\Entity\DemoEntity",
     *        permission="EDIT"
     *   )
     */
    public function updateAction(DemoEntity $entity, Request $request): RedirectResponse|array
    {
        $updateMessage = "Updated!";
        return $this->update($entity, $request, $updateMessage);
    }

    protected function update(
        DemoEntity $entity,
        Request    $request,
        string     $message = ''
    ): array|RedirectResponse
    {
        return $this->get(UpdateHandlerFacade::class)->update(
            $entity,
            $this->createForm(DemoType::class, $entity),
            $message,
            $request
        );
    }

    public static function getSubscribedServices(): array
    {
        return array_merge(
            parent::getSubscribedServices(),
            [
                TranslatorInterface::class,
                UpdateHandlerFacade::class,
            ]
        );
    }
}
