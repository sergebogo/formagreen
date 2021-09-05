<?php

namespace App\Form;

use App\Entity\GreenArea;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GreenAreaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ga_lat')
            ->add('ga_long')
            ->add('ga_surface')
            ->add('ga_details')
            //->add('ga_photo')
            ->add('ga_startedAt')
            ->add('ga_finishedAt')
            //->add('formingStructure')
            //->add('members')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => GreenArea::class,
        ]);
    }
}
