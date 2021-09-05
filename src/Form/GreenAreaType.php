<?php

namespace App\Form;

use App\Entity\FormingStructure;
use App\Entity\GreenArea;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
            ->add('formingStructure', EntityType::class, [
                'class' => FormingStructure::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('fs')
                        ->orderBy('fs.id', 'ASC');
                },
                'choice_label' => 'fs_nom',
                'choice_value' => "id",
            ]);
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
