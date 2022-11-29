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
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;


class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ->add('RefStatut', TextType::class,["attr" => ["class" => "form-control"]])
            ->add('email')
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            // ->add('roles', BackType::class, [
            //     "class" => TextAlign::class
            // ])
            ->add('nom', TextType::class, [
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add('prenom', TextType::class, [
                "attr" => [
                    "class" => "form-control"
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
            ->add('miage', TextType::class, [
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add('region', TextType::class, [
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add('etatLogement', IntegerType::class, [
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add('EtatTransport', IntegerType::class, [
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            // ->add('RefTransport', IntegerType::class, [
            //     "attr" => [
            //         "class" => "form-control"
            //     ]
            // ])
            // ->add('RefLogement', IntegerType::class, [
            //     "attr" => [
            //         "class" => "form-control"
            //     ]
            // ])
            // ->add('activites', IntegerType::class, [
            //     "attr" => [
            //         "class" => "form-control"
            //     ]
            // ])
                // ->add('NomStaut', TextType::class,["attr" => ["class" => "form-control"]])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);

    }
}
