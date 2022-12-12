<?php

namespace App\Form;

use App\Entity\Profil;
use App\Entity\Users;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('phone')
            ->add('Nom',EntityType::class,[
        'label' => 'Users',
        'class' => Users::class,
        'choice_label' => 'nom'
    ])
            ->add('Prenom',EntityType::class,[
        'label' => 'Users',
                'class' => Users::class,
                'choice_label' => 'prenom'
            ])
            ->add('Username',EntityType::class,[
                'label' => 'Users',
                'class' => Users::class,
                'choice_label' => 'username'
            ])
            ->add('Password',EntityType::class,[
                'label' => 'Users',
                'class' => Users::class,
                'choice_label' => 'password'
            ])
            ->add('Email',EntityType::class,[
                'label' => 'Users',
                'class' => Users::class,
                'choice_label' => 'email'
            ])
            ->add('Age',EntityType::class,[
                'label' => 'Users',
                'class' => Users::class,
                'choice_label' => 'age'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Profil::class,
        ]);
    }
}
