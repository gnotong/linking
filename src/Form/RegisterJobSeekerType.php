<?php

declare(strict_types=1);

namespace App\Form;

use App\Entity\JobSeeker;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterJobSeekerType extends RegisterType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => JobSeeker::class,
        ]);
    }
}
