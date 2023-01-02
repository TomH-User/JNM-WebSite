<?php

namespace App\Form;

use App\Entity\Video;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class VideoFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lien', TextType::class,["label"=> "Lien de la vidéo"])
            ->add('nbVotes')
            ->add('refUtilisateur')
            ->add('Miage', ChoiceType::class, [
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
            ->add('Publier',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Video::class,
        ]);
    }
}
