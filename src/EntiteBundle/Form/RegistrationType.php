<?php

namespace EntiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'roles', ChoiceType::class,

            array(
                'label' => 'Type du compte',
                'choices' => array(
                    'ETABLISSEMENT' => 'ROLE_ETABLISSEMENT',
                    'CLIENT' => 'ROLE_CLIENT'),
                'required' => true,
                'expanded' => true,
                'multiple' => true,)
        );

    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getParent()

    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()

    {
        return 'app_user_registration';
    }

    public function getName()

    {
        return $this->getBlockPrefix();
    }

}
