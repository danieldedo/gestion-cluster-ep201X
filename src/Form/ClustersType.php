<?php

namespace App\Form;

use App\Entity\Arrondissements;
use App\Entity\Clusters;
use App\Entity\Communes;
use App\Entity\Departements;
use App\Entity\Filieres;
use App\Entity\Villages;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ClustersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'attr' => [
                    'placeholder' => 'Nom',
                    'class' => 'form-control validate',
                    'minlength' => '3',
                    'maxlength' => '50'
                ],
                'required' => true,
                'label' => 'Nom',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'constraints' => [
                    new Assert\Length(['min' => 3, 'max' => 50]),
                    new Assert\NotBlank()
                ]
                ])
            ->add('filiere', EntityType::class, [
                'placeholder' => 'Sélectionnez une filiere',
                'class' => Filieres::class,
                'choice_label' => 'nom',
                'attr' => ['class' => 'form-control'],
                'required' => true,
                'label' => 'Filiere',
                'label_attr' => [
                    'class' => 'form-label',
                ],
            ])
            ->add('village', EntityType::class, [
                'placeholder' => 'Sélectionnez un village',
                'class' => Villages::class,
                'choice_label' => 'nom',
                'attr' => ['class' => 'form-control'],
                'required' => true,
                'label' => 'Village',
                'label_attr' => [
                    'class' => 'form-label',
                ],
            ])

            /********************************************** */
            ->add('departement', EntityType::class, [
                'placeholder' => 'Sélectionnez un departement',
                'mapped' => false,
                'class' => Departements::class,
                'choice_label' => 'nom',
                'attr' => ['class' => 'form-control'],
                'required' => true,
                'label' => 'Departement',
                'label_attr' => [
                    'class' => 'form-label',
                ],
            ])
            ->add('commune', EntityType::class, [
                'placeholder' => 'Sélectionnez une commune',
                'mapped' => false,
                'disabled' => true,
                'class' => Communes::class,
                'choice_label' => 'nom',
                'attr' => ['class' => 'form-control'],
                'required' => true,
                'label' => 'Commune',
                'label_attr' => [
                    'class' => 'form-label',
                ],
            ])
            ->add('arrondissement', EntityType::class, [
                'placeholder' => 'Sélectionnez un arrondissement',
                'mapped' => false,
                'disabled' => true,
                'class' => Arrondissements::class,
                'choice_label' => 'nom',
                'attr' => ['class' => 'form-control'],
                'required' => true,
                'label' => 'Arrondissement',
                'label_attr' => [
                    'class' => 'form-label',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Clusters::class,
        ]);
    }
}
