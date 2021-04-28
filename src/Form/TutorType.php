<?php

namespace App\Form;

use App\Entity\Tutor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TutorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('email')
            ->add('password')
            ->add('firstName')
            ->add('lastName')
            ->add('cin')
            ->add('status')
            ->add('dateBirth')
            ->add('dateAdd')
            ->add('profilePicture')
            ->add('state')
            ->add('phoneNumber')
            ->add('nbFormation')
            ->add('certificats')
            ->add('nbStudent')
            ->add('priceHour')
            ->add('schedule')
            ->add('cv')
            ->add('video')
            ->add('subject')
            ->add('language')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Tutor::class,
        ]);
    }
}
