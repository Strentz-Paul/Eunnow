<?php

declare(strict_types=1);

namespace App\Form;

use App\DTO\SimulateurDTO;
use App\Form\Field\SubmitCustomType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Validator\ValidatorExtension;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Validation;

class SimulateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('tjm', NumberType::class, array(
                'label' => 'simulateur.tjm',
                'attr' => array(
                    'min' => 0
                )
            ))
            ->add('nbJours', IntegerType::class, array(
                'label' => 'simulateur.nb_jour',
                'attr' => array(
                    'min' => 0
                )
            ))
            ->add('tauxImpots', NumberType::class, array(
                'label' => 'simulateur.taux_impots',
                'attr' => array(
                    'min' => 0
                )
            ))
            ->add('palierTVA', NumberType::class, array(
                'label' => 'simulateur.palier_tva',
                'attr' => array(
                    'min' => 0
                )
            ))
            ->add('tauxTVA', NumberType::class, array(
                'label' => 'simulateur.taux_tva',
                'attr' => array(
                    'min' => 0
                )
            ))
            ->add('submit', SubmitCustomType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SimulateurDTO::class
        ]);
    }

    protected function getExtensions()
    {
        return array(new ValidatorExtension(Validation::createValidator()));
    }
}
