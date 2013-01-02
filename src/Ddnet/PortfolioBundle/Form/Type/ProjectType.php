<?php
namespace Ddnet\PortfolioBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Ddnet\PortfolioBundle\Entity\Project;

class ProjectType extends AbstractType
{
    public function buildForm( FormBuilderInterface $builder, array $options ) 
    {
        $builder->add( 'name' );
        $builder->add( 'description' );
        $builder->add( 'dev_url', 'text', array(
            'label'     =>  'Development Server URL'
        ) );
        $builder->add( 'prod_url', 'text', array(
            'label'     =>  'Production Server URL'
        ) );
        $builder->add( 'category' );
        $builder->add( 'status' );
        $builder->add( 'github_repo', 'text', array(
            'label'     =>  'Github Repository'
        ) );
        $builder->add( 'github_branch', 'text', array(
            'label'     =>  'Github Branch'
        ) );
        $builder->add( 'github_user', 'text', array(
            'label'     =>  'Github User'
        ) );
        
        $builder->add( 'version' );
        $builder->add( 'user' );
        $builder->add( 'thumbnail', 'file', array(
            'label'     =>  'Project Thumbnail'
        ) );
        $builder->add( 'photo', 'file', array(
            'label'     =>  'Project Image'
        ) );
    }
  
    public function getName() {
        return 'project';
    }
}