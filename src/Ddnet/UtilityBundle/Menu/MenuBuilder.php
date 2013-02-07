<?php
namespace Ddnet\UtilityBundle\Menu;

use Knp\Menu\FactoryInterface,
    Symfony\Component\DependencyInjection\ContainerAwareInterface,
    Symfony\Component\DependencyInjection\ContainerInterface,
    Symfony\Component\HttpFoundation\Request;

class MenuBuilder implements ContainerAwareInterface
{
    public function __construct( FactoryInterface $factory, ContainerInterface $container = null )
    {
        $this->factory = $factory;
        $this->container = $container;
        $this->user = $container->get(' security.context' )->getToken()->getUser();
    }
    
    public function setContainer( ContainerInterface $container = null )
    {
        $this->container = $container;
    }

    public function createMainMenu( Request $request )
    {
        $menu = $this->factory->craeteItem( 'root' );
        
        $menu->addChild(
                'home',
                array(
                    'uri'   =>  'homepage'
        ) );
        $menu->addChild(
                'portfolio',
                array(
                    'uri'   =>  'portfolio'
        ) );
        $menu['portfolio']->addChild(
                'by status',
                array(
                    'uri'   =>  'status',
        ) );
        $menu['portfolio']->addChild(
                'by category',
                array(
                    'uri'   =>  'category',                    
        ) );
        $menu['portfolio']->addChild(
                'add a project',
                array(
                    'uri'   =>  'project_new'
        ) );
        $menu->addChild(
                'contact',
                array(
                    'uri'   =>  'contact'
        ) );
        if( $user->isGranted( "IS_AUTHENTICATED_REMEMBERED" ) )
        {
            $menu->addChild(
                    'signout',
                    array(
                        'uri'   =>  'fos_user_security_logout'
            ) );
        }
        else
        {
            $menu->addChild(
                    'signin',
                    array(
                        'uri'   =>  'fos_user_security_login'
            ) );
        }

        return $menu;
    }
}