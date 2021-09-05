<?php

namespace App\Form;

use App\Entity\FormingStructure;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormingStructureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fs_nom')
            ->add('fs_type', ChoiceType::class, [
                'required' => true,
                'choices' => [
                    'Choisir la catégorie' => '',
                    'School' => 'school',
                    'Training Center' => 'training_center',
                    'Center' => 'center'
                ]
            ])
            ->add('fs_adresse')
            ->add('fs_email')
            ->add('fs_phone')
            ->add('fs_representing_name')
            //->add('fs_createdAt')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => FormingStructure::class,
        ]);
    }
}
