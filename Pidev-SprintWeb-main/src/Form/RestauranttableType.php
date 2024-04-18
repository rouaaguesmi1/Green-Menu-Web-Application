<?php

namespace App\Form;

use App\Entity\Restauranttable;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RestauranttableType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
{
    $builder
    ->add('isoccupied', ChoiceType::class, [
        'choices' => [
            'Yes' => 1,
            'No' => 0,
        ],
        'expanded' => true, // If you want radio buttons instead of a dropdown
        'choice_attr' => function($choice, $key, $value) {
            return ['class' => 'mr-9']; // Add margin-right to create spacing between options
        },
        'row_attr' => ['class' => 'input-group mb-3'],
    ])
        ->add('restaurantid');
}

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Restauranttable::class,
        ]);
    }
}
