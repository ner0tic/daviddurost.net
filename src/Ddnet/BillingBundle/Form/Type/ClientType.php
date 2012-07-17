<?php
  // src/Ddnet/BillingBundle/Form/Type/ClientType.php

namespace Ddnet\BillingBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\CallbackValidator;
use Symfony\Component\Form\FormValidatorInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClientType extends AbstractType {
  public function buildFormInterface(FormBuilder $builder, array $options) {
    parent::buildForm($builder, $options);

  }
  public function getName() { return 'client'; }
  public function getDefaultOptions() {
    return array('data_class' => "Ddnet\BillingBundle\Entity\Client");
    
  }
}