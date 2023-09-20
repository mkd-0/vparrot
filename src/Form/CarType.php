<?php

namespace App\Form;

use App\Form\VichImageType;
use App\Entity\Car;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Vich\UploaderBundle\Form\Type\VichFileType;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('mileage')
            ->add('power')
            ->add('price')
            ->add('dateCirculation')
            ->add('reference')
            ->add('brand')
            ->add('model')
            ->add('year')
            ->add('color')
            ->add('energy')
            ->add('imageFile', VichFileType::class, [
    'label' => 'Image',
]);
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}
