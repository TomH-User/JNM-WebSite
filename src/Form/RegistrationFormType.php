<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;


class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('RefStatut', TextType::class,["attr" => ["class" => "form-control"]])
            ->add('email')
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => 
                [
                    new IsTrue
                    ([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, 
            [
                "label"=>"Mot de passe ",
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => 
                [
                    new NotBlank
                    ([
                        'message' => 'Please enter a password',
                    ]),
                    new Length
                    ([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('nom', TextType::class, 
            [
                "attr" => 
                [
                    "class" => "form-control", 
                    "placeholder"=> "Last name", 
                    "aria-label"=>"Last name"
                ]
            ])
            ->add('prenom', TextType::class, 
            [
                "attr" => 
                [
                    "class" => "form-control", 
                    "placeholder"=> "First name", 
                    "aria-label"=>"First name"
                ]
            ])
            ->add('DateNaissance', BirthdayType::class, [
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add('NumTel', TextType::class, [
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add('adresse', TextType::class, [
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add('miage', ChoiceType::class, [
                "choices" => [
                   
                "Aix-Marseille"=>"Aix-Marseille",
                "Amiens"=>"Amiens",
                "Antilles"=>"Antilles",
                "Bordeaux"=>"Bordeaux",
                 "Grenoble"=> "Grenoble",
                "Lille"=> "Lille",
                "Lyon"=> "Lyon",
                "Mulhouse"=> "Mulhouse",
                "Nancy"=> "Nancy",
                "Nantes"=> "Nantes",
                "Nice"=> "Nice",
                "Nouvelle-Calédonie"=> "Nouvelle-Calédonie",
                "Orléans"=> "Orléans",
                "Paris-Dauphine"=>"Paris-Dauphine",
                "Paris-Descartes"=>"Paris-Descartes",
                "Paris Nanterre"=>"Paris Nanterre",
                "Paris Saclay Evry"=>"Paris Saclay Evry",
                "Paris Saclay Orsay"=>"Paris Saclay Orsay",
                "Paris Sorbonne"=> "Paris Sorbonne",
                "Rennes"=> "Rennes" ,
                "Toulouse" =>"Toulouse",
                ]
            ])
            
            
            ->add('region', TextType::class, [
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            
            ->add('etatLogement', ChoiceType::class, [
                "label"=>"Avez vous réservé un logement ",
                
                "choices" => [
                    "Aucune reservation" => 0,
                    "En attente" =>1,
                    "Déja reservé"=>2
                ]
            ])

            ->add('EtatTransport', ChoiceType::class, [
                "label"=>"Avez vous réservé un transport ",
                "choices" => [
                    "Aucune reservation" => 0,
                    "En attente" =>1,
                    "Déja reservé"=>2
                ]
            ])

            ->add('RefStatut', ChoiceType::class, [
                "label"=>"Votre situation ",
                "choices" => [
                    "Etudiant"=>"Etudiant",
                    "Ancien diplômé"=>"Ancien diplômé",
                    "Enseignant"=>"Enseignant",
                    "Directeur d’une Miage"=>"Directeur d’une Miage",
                    "Membre du BDE"=>"Membre du BDE",
                    "Responsable d’un pôle"=>"Responsable d’un pôle",
                    "Membre du CA de l’association"=>"Membre du CA de l’association",
                ],
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class
        ]);

    }
}
