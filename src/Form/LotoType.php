<?php

declare(strict_types=1);

namespace App\Form;

use App\DTO\LotoDTO;
use App\Form\Field\SubmitCustomType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Validator\ValidatorExtension;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Validation;

class LotoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombreTirage', NumberType::class, array(
                'label' => 'loto.nombre_de_tirage',
                'attr' => array(
                    'min' => 0
                )
            ))
            ->add('typeDeTirage', ChoiceType::class, array(
                'choices' => array(
                    'Loto' => 'loto',
                    'Euromillion' => 'euromillion'
                ),
                'required' => true,
                'label' => 'loto.choix_du_type'
            ))

            ->add('submit', SubmitCustomType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => LotoDTO::class
        ]);
    }

    protected function getExtensions()
    {
        return array(new ValidatorExtension(Validation::createValidator()));
    }
}
