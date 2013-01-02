<?php
namespace Ddnet\PortfolioBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Ddnet\PortfolioBundle\Entity\ProjectStatus;

class ProjectStatusType extends AbstractType
{
    public function buildForm( FormBuilderInterface $builder, array $options ) 
    {
        $builder->add( 'name' );
        $builder->add( 'description' );
    }
  
    public function getName() {
        return 'project_status';
    }
}