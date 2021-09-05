<?php

namespace App\Form;

use App\Entity\Member;
use App\Entity\Subscription;
use App\Repository\MemberRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SubscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('sb_montant')
            ->add('sb_start')
            ->add('sb_end')
            //->add('sb_createdAt')
            //->add('sb_isValid')
            ->add('sb_method', ChoiceType::class, [
                'required' => true,
                'choices' => [
                    '' => '',
                    'virement' => 'Virement',
                    'espece' => 'Espèce',
                    'cheque' => 'Chèque',
                    'bitcoin' => 'Bitcoin'
                ]
            ])
            ->add('member', EntityType::class, [
                'class' => Member::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('m')
                        ->orderBy('m.id', 'ASC');
                },
                'choice_label' => function (Member $member) {
                    return $member->getMbPrenom() . ' ' . $member->getMbNom();
                },
                'choice_value' => "id",
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Subscription::class,
        ]);
    }

    public function getMemberWithNoSubs(MemberRepository $er)
    {
        $er->findAll();
    }
}
