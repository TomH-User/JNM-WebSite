<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UsersFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ->add('email')
            // ->add('roles')
            // ->add('password')
            ->add('nom')
            ->add('prenom')
            // ->add('DateNaissance')
            // ->add('NumTel')
            // ->add('adresse')
            // ->add('miage')
            // ->add('region')
            // ->add('etatLogement')
            // ->add('EtatTransport')
            // // ->add('RefTransport')
            // ->add('RefLogement')
            // ->add('activites')
            // ->add('RefStatut')
            ->add('Valider',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
