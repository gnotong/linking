<?php

declare(strict_types=1);

namespace App\Form;

use App\Entity\Offer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\LessThan;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;

class PublishOfferType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('name', TextType::class, [
                'label' => 'Name',
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('companyDescription', TextareaType::class, [
                'label' => 'Company Description',
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('jobDescription', TextareaType::class, [
                'label' => 'Job Description',
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('location', TextType::class, [
                'label' => 'Location',
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('maxSalary', NumberType::class, [
                'label' => 'Max Salary',
                'constraints' => [
                    new NotBlank(),
                    new Type(['type' => 'integer']),
                    new GreaterThan(['propertyPath' => 'minSalary'])
                ]
            ])
            ->add('minSalary', NumberType::class, [
                'label' => 'Min Salary',
                'constraints' => [
                    new NotBlank(),
                    new Type(['type' => 'integer']),
                    new LessThan(['propertyPath' => 'maxSalary'])
                ]
            ])
            ->add('missions', TextareaType::class, [
                'label' => 'Missions',
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('profile', TextareaType::class, [
                'label' => 'Profile',
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('tasks', TextareaType::class, [
                'label' => 'Tasks',
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('softSkills', TextareaType::class, [
                'label' => 'Soft Skills',
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('remote', CheckboxType::class, [
                'label' => 'Remote',
                'constraints' => [
                    new NotBlank()
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Offer::class,
        ]);
    }
}
