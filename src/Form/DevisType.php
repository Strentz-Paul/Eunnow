<?php

declare(strict_types=1);

namespace App\Form;

use App\DTO\DevisDTO;
use App\Form\Field\SubmitCustomType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Validator\ValidatorExtension;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Validation;

class DevisType extends AbstractType
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
            ->add('entrepriseName', TextType::class, array(
                'label' => 'devis.entreprise_label',
                'required' => true
            ))
            ->add('tauxTVA', NumberType::class, array(
                'label' => 'simulateur.taux_tva',
                'attr' => array(
                    'min' => 0
                )
            ))
            ->add('tvaApplicable', CheckboxType::class, array(
                'label' => 'entreprise.tva_applicable_label'
            ))
            ->add('mois', ChoiceType::class, array(
                'choices' => array(
                    'Janvier' => 'Janvier',
                    'Fevrier' => 'Fevrier',
                    'Mars' => 'Mars',
                    'Arvil' => 'Avril',
                    'Mai' => 'Mai',
                    'Juin' => 'Juin',
                    'Juillet' => 'Juillet',
                    'Août' => 'Août',
                    'Septembre' => 'Septembre',
                    'Octobre' => 'Octobre',
                    'Novembre' => 'Novembre',
                    'Décembre' => 'Décembre',
                ),
                'label' => 'entreprise.mois_label'
            ))
            ->add('submit', SubmitCustomType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => DevisDTO::class
        ]);
    }

    protected function getExtensions()
    {
        return array(new ValidatorExtension(Validation::createValidator()));
    }
}
