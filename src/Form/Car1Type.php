<?php

namespace App\Form;

namespace App\Form;

use App\Form\VichImageType;
use App\Entity\Car;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class Car1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('mileage')
            ->add('power')
            ->add('price')
            ->add('isSold')
            ->add('dateCirculation')
            ->add('reference')
            ->add('img')
            ->add('brand')
            ->add('model')
            ->add('year')
            ->add('color')
            ->add('energy')
        
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}
