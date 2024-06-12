<?php

namespace Fantasy\Bundle\DemoBundle\Form\Type;

use Fantasy\Bundle\DemoBundle\Entity\OnDeliverySettings;
use Fantasy\Bundle\DemoBundle\Entity\Repository\OnDeliverySettingsRepository;
use Oro\Bundle\LocaleBundle\Form\Type\LocalizedFallbackValueCollectionType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;


class OnDeliverySettingsType extends AbstractType
{
    const BLOCK_PREFIX = 'on_delivery_setting_type';

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'labels',
                LocalizedFallbackValueCollectionType::class,
                [
                    'label' => 'fantasy.on_delivery.settings.labels.label',
                    'required' => true,
                    'entry_options' => ['constraints' => [new NotBlank()]],
                ]
            )
            ->add(
                'shortLabels',
                LocalizedFallbackValueCollectionType::class,
                [
                    'label' => 'fantasy.on_delivery.settings.short_labels.label',
                    'required' => true,
                    'entry_options' => ['constraints' => [new NotBlank()]],
                ]
            );
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(
            [
                'data_class' => OnDeliverySettings::class,
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix(): string
    {
        return self::BLOCK_PREFIX;
    }
}
