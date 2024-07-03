<?php

namespace Fantasy\Bundle\DemoBundle\Form\Type;

use Fantasy\Bundle\DemoBundle\Entity\DemoEntity;
use Fantasy\Bundle\DemoBundle\Enum\EType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class DemoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class,
                [
                    'constraints' => [new NotBlank(), new Length(['max' => 250])],
                    'label'       => 'Name',
                    'required'    => true
                ]
            )
            ->add('type', ChoiceType::class,
                [
                    'choices'      => EType::getChoices(),
                    'choice_label' => fn($choice) => $choice->getLabel(),
                    'label'        => 'Type',
                    'required'     => true,
                    'constraints'  => [new NotBlank()]
                ])
            ->add('description', TextType::class,
                [
                    'constraints' => [new Length(['max' => 200])],
                    'label'       => 'Description',
                    'required'    => false
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DemoEntity::class
        ]);
    }
}
