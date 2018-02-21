<?php

namespace EntiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtablissementType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->
        add('nom')
            ->add('adresse')
            ->add('gouvernorat')
            ->add('ville')
            ->add('note')
            ->add('horraire')
            ->add('longitude')
            ->add('latitude')
            ->add('estActive');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EntiteBundle\Entity\Etablissement'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'entitebundle_etablissement';
    }


}
