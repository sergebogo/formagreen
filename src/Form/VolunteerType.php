<?php

namespace App\Form;

use App\Entity\Volunteer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VolunteerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mb_nom')
            ->add('mb_prenom')
            ->add('mb_gender', ChoiceType::class, [
                'required' => true,
                'choices' => [
                    'Male' => 'M',
                    'Female' => 'F',
                ]
            ])
            ->add('mb_email')
            ->add('mb_phone')
            ->add('mb_adresse')
            //->add('mb_date_insc')
            ->add('vt_mobility', ChoiceType::class, [
                'required' => true,
                'choices' => [
                    'Yes' => 1,
                    'No' => 0,
                ]
            ])
            ->add('vt_skills')
            ->add('vt_years_exp')
           // ->add('greenAreas')
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
            'data_class' => Volunteer::class,
        ]);
    }
}
