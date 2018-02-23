<?php

namespace EntiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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
            ->add('gouvernorat',ChoiceType::class,
                array(
                'choices' => array(
                    'Ariana' => 'Ariana',
                    'Béja' => 'Beja',
                    'Ben Arous' => 'BenArous',
                    'Bizerte' => 'Bizerte',
                    'Gabès' => 'Gabes',
                    'Gafsa' => 'Gafsa',
                    'Jendouba' => 'Jendouba',
                    'Kairouan' => 'Kairouan',
                    'Kasserine' => 'Kasserine',
                    'Kébili' => 'Kebili',
                    'Le Kef' => 'LeKef',
                    'Mahdia' => 'Mahdia',
                    'La Manouba' => 'LaManouba',
                    'Médenine' => 'Medenine',
                    'Monastir' => 'Monastir',
                    'Nabeul' => 'Nabeul',
                    'Sfax' => 'Sfax',
                    'Sidi Bouzid' => 'SidiBouzid',
                    'Siliana' => 'Siliana',
                    'Sousse' => 'Sousse',
                    'Tataouine' => 'Tataouine',
                    'Tozeur' => 'Tozeur',
                    'Tunis' => 'Tunis',
                    'Zaghouan' => 'Zaghouan'
                )))
            ->add('ville',ChoiceType::class,
                array(
                'choices'=>array('tbolba'=>'Teboulba')
            ))
            ->add('note')
            ->add('horraire')
            ->add('longitude')
            ->add('latitude')
            ->add('estActive')
            ->add('Enregistrer',SubmitType::class)
            -> setMethod('POST');;
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
