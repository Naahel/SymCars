<?php

namespace App\Form;

use App\Entity\Vehicule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class VehiculeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'minlength' => '2',
                    'maxlength' => '50'
                ],
                'label' => 'Nom du véhicule',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Le nom du véhicule est obligatoire'
                    ]),

                    new Assert\Length([
                        'min' => 2,
                        'max' => 50,
                        'minMessage' => 'Le nom du véhicule doit contenir au moins {{ limit }} caractères',
                        'maxMessage' => 'Le nom du véhicule doit contenir au maximum {{ limit }} caractères'
                    ])
                ]
            ])
            ->add('brand', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'minlength' => '2',
                    'maxlength' => '50'
                ],
                'label' => 'Marque du véhicule',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'La marque du véhicule est obligatoire'
                    ]),

                    new Assert\Length([
                        'min' => 2,
                        'max' => 50,
                        'minMessage' => 'La marque du véhicule doit contenir au moins {{ limit }} caractères',
                        'maxMessage' => 'La marque du véhicule doit contenir au maximum {{ limit }} caractères'
                    ])
                ]
            ])
            ->add('mileage', TextType::class, [
                'attr' => [
                    'class' => 'form-control'
                ],
                'label' => 'Kilométrage',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ]
            ])
            ->add('place', TextType::class, [
                'attr' => [
                    'class' => 'form-select'
                ],
                'label' => 'Nombre de places',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-dark mt-4'
                ],
                'label' => 'Enregistrer'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehicule::class,
        ]);
    }
}
