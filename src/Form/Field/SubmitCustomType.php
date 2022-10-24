<?php

declare(strict_types=1);

namespace App\Form\Field;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SubmitCustomType extends SubmitType
{
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        parent::configureOptions($resolver);
        $resolver->setDefaults(array(
            'label' => 'global.submit',
            'attr' => array(
                'class' => 'btn btn-primary'
            )
        ));
    }
}
