<?php
namespace Ddnet\UtilityBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ContactType extends AbstractType {
  public function buildForm(FormBuilderInterface $builder, array $options) {
    $builder->add('name', 'text')
            ->add('email_address','text')
            ->add('url', 'url')
            ->add('topic', 'text')
            ->add('message','textarea');
  }
  
  public function getName() {
    return 'contact';
  }
}
?>
