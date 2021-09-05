<?php

namespace App\Form;

use App\Entity\Structure;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StructureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mb_nom')
            ->add('mb_prenom')
            //->add('qrcode')
            ->add('mb_gender', ChoiceType::class, [
                'required' => true,
                'choices' => [
                    'Séléctionner genre' => '',
                    'Other' => 'O',
                    'Male' => 'M',
                    'Female' => 'F',
                ]
            ])
            ->add('mb_email')
            ->add('mb_phone')
            ->add('mb_adresse')
            //->add('mb_date_insc')
            ->add('st_secteur')
            ->add('st_website')
            ->add('st_country_origi')
            ->add('representing')//->add('greenAreas')
        ;

        /*$builder->get('mb_gender')
            ->addModelTransformer(new CallbackTransformer(
                function ($genderArray) {
                    return count($genderArray) ? $genderArray[0] : null;
                },
                function ($genderString) {
                    return [$genderString];
                }
            ));*/
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Structure::class,
        ]);
    }
}
