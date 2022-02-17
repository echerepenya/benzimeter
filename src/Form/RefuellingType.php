<?php

namespace App\Form;

use App\Entity\Refuelling;
use App\Entity\Car;
use App\Entity\Fuel;
use App\Entity\PetrolStation;
use App\Entity\Currency;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class RefuellingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('car', EntityType::class, [
                'label' => 'Автомобиль',
                'class' => Car::class,
                'placeholder' => 'Выберите автомобиль',
                //'required' => false,
                //'choice_label' => 'reg_number',
                'choice_label' => function ($car) {
                    return $car->getBrand() .' '. $car->getModel() .' - '. $car->getRegNumber();
                }
            ])
            ->add('fuel', EntityType::class, [
                'label' => 'Вид топлива',
                'class' => Fuel::class,
                'choice_label' => 'type'
            ])
            ->add('petrolStation', EntityType::class, [
                'label' => 'Заправка',
                'class' => PetrolStation::class,
                'choice_label' => 'name'
            ])
            ->add('litres', null, [
                'label' => 'Литры',
            ])
            ->add('cost', null, [
                'label' => 'Полная стоимость',
            ])
            ->add('currency', EntityType::class, [
                'label' => 'Валюта',
                'class' => Currency::class,
                'choice_label' => 'name'
            ])

            ->add('createdAt', null, ['label' => 'Время заправки'])
            ->add('Save', SubmitType::class, ['label' => 'Отправить'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Refuelling::class,
        ]);
    }
}
