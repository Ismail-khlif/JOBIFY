<?php

namespace App\Form;

use App\Entity\Evenement;
use App\Entity\Formation;
use App\Entity\Post;
use App\Entity\Users;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UsersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('username')
            ->add('password')
            ->add('role',ChoiceType::class,[
                'choices'=>["Entrepreneur"=>"Entrepreneur","Candidat"=>"Candidat"]])
            ->add('email')
            ->add('age')

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
