<?php

namespace App\Form;

use App\Entity\Partnership;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PartnershipType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ps_shop_name')
            ->add('ps_shop_addr')
            ->add('ps_shop_category', ChoiceType::class, [
                'required' => true,
                'choices' => [
                    '' => '',
                    'Flower' => 'Flower',
                    'Fashion' => 'Fashion',
                    'Pizza' => 'Pizza',
                    'Jewerly' => 'jewerly'
                ]
            ])
            //->add('subscriptions')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Partnership::class,
        ]);
    }
}
