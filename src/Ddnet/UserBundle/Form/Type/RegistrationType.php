<?php

namespace Ddnet\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->add( 'first_name' );
        $builder->add( 'last_name' );
        $builder->add( 'url', 'text', array(
            'label'     =>  'Homepage'
        ) );
    }

    public function getName()
    {
        return 'ddnet_user_registration';
    }
}