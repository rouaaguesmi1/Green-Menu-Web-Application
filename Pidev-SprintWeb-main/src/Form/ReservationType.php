<?php

namespace App\Form;

use App\Entity\Reservation;
use App\Entity\Restauranttable;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Doctrine\ORM\EntityManagerInterface;

class ReservationType extends AbstractType
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('datetime', DateTimeType::class, [
                'label' => 'Reservation Datetime',
                'widget' => 'single_text',
                'html5' => false,
                'attr' => ['class' => 'datetimepicker'], // Add class for targeting with JavaScript
            ])
            ->add('numberofpersons', ChoiceType::class, [
                'label' => 'Number of Persons',
                'choices' => $this->getNumberChoices(),
            ])
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }

    private function getNumberChoices(): array
    {
        $choices = [];
        for ($i = 1; $i <= 10; $i++) {
            $choices[$i] = $i;
        }
        return $choices;
    }

   
}
