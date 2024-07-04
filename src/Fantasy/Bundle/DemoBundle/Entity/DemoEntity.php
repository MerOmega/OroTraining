<?php

namespace Fantasy\Bundle\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Fantasy\Bundle\DemoBundle\Entity\Repository\DemoEntityRepository;
use Fantasy\Bundle\DemoBundle\Enum\EType;
use Oro\Bundle\EntityConfigBundle\Metadata\Annotation\Config;
use Oro\Bundle\EntityConfigBundle\Metadata\Annotation\ConfigField;
use Oro\Bundle\EntityExtendBundle\Entity\ExtendEntityInterface;
use Oro\Bundle\EntityExtendBundle\Entity\ExtendEntityTrait;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="demo_entity")
 * @ORM\Entity(repositoryClass="Fantasy\Bundle\DemoBundle\Entity\Repository\DemoEntityRepository")
 * @ORM\HasLifecycleCallbacks()
 * @Config(
 *     routeName="demo_index",
 *     routeView="demo_index",
 *     routeCreate="demo_create",
 *     defaultValues={
 *         "entity"={
 *             "label"="Demo Entity",
 *             "plural_label"="Demo Entities",
 *             "description"="Demo Entity Description",
 *             "entity_alias"="DemoEntity",
 *             "entity_plural_alias"="DemoEntities"
 *         },
 *              "security"={
 *              "type"="ACL",
 *              "permissions"="All",
 *              "group_name"="",
 *              "category"="",
 *          },
 *          "form" = {
 *              "form_type"="Fantasy\Bundle\DemoBundle\Form\Type\DemoType",
 *              "grid_name"="demo-grid"
 *          },
 *          "dataaudit"={
 *              "auditable"=true
 *          },
 *          "extend"={
 *               "is_extend"=true
 *           }
 *     }
 * )
 */
class DemoEntity implements ExtendEntityInterface
{

    use ExtendEntityTrait;

    const ENUM_CODE_TYPE = 'type_data';

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column (type="string", length=250, nullable=false)
     * @ConfigField(
     * defaultValues={
     * "importexport"={"full"=true},
     * "dataaudit"={"auditable"=true}
     * }
     * )
     */
    private $name;

    /**
     * @ORM\Column (type="string", length=200)
     * @ConfigField(
     *     defaultValues={
     *         "importexport"={"full"=true},
     *         "dataaudit"={"auditable"=true}
     *     }
     * )
     */
    private $description;

    /**
     * @ORM\Column (type="string", length=50, enumType=EType::class)
     * @ConfigField(
     *     extend={
     *         "is_extend"=true,
     *     }
     * )
     */
    private ?EType $type = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Oro seems to not support enums types at the moment, so when a twig needs this field
     * calls the nameProvider to get a string. As an enum is a class, we need to return a string
     * so it doesn't break.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type?->getLabel();
    }

    public function setType(?EType $type): self
    {
        $this->type = $type;

        return $this;
    }
}
