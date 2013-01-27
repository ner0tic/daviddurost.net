<?php
namespace Ddnet\PortfolioBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture,
    Doctrine\Common\DataFixtures\OrderedFixtureInterface,
    Doctrine\Common\Persistence\ObjectManager,

    Ddnet\PortfolioBundle\Entity\Project;

class LoadProjectData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load( ObjectManager $manager )
    {
        ////////////////////////////////////////////////////////////////////////
        // Summer Camp Scheduling System
        ////////////////////////////////////////////////////////////////////////
        $scss           =   new Project();
        $scss->setName( 'summer camp scheduling system' )
             ->setDescription( 'multi portaled scheduling system for summer camps and other learning facilities.' )
             ->setUrl( 'http://scss.daviddurost.net' )
             ->setCategory( $this->getReference( 'category-wd-s2' ) )
             ->setStatus( $this->getReference( 'status-active' ) );
        $this->addReference( 'scss', $scss );
        $manager->persist( $scss );
        
        ////////////////////////////////////////////////////////////////////////
        // RideSocial
        ////////////////////////////////////////////////////////////////////////
        $ridesocial     =   new Project();
        $ridesocial->setName( 'ridesocial' )
                   ->setDescription( 'social ride sharing network' )
                   ->setUrl( 'http://ridesocial.davidddurost.net' )
                   ->setCategory( $this->getReference( 'category-wd-s2' ) )
                   ->setStatus( $this->getReference( 'status-active' ) );
        $this->addReference( 'ridesocial', $ridesocial );
        $manager->persist( $ridesocial );
        
        ////////////////////////////////////////////////////////////////////////
        // daviddurost.net
        ////////////////////////////////////////////////////////////////////////
        $dd             =   new Project();
        $dd->setName(' daviddurost.net' )
           ->setDescription( 'Portfolio site.' )
           ->setUrl( 'http://redesign.daviddurost.net' )
           ->setCategory( $this->getReference( 'category-wd-s2' ) )
           ->setStatus( $this->getReference( 'status-active' ) );
        $this->addReference( 'ddnet', $dd );
        $manager->persist( $dd );
        
        ////////////////////////////////////////////////////////////////////////
        // Landmarx
        ////////////////////////////////////////////////////////////////////////
        $landmarx       =   new Project();
        $landmarx->setName( 'landmarx' )
                 ->setDescription( 'Node tree styled backbone to drive a mapping application for custom landmarks and waypoints.' )
                 ->setUrl( 'http://landmarx.daviddurost.net' )
                 ->setCategory( $this->getReference( 'category-wd-s2' ) )
                 ->setStatus( $this->getReference( 'status-active' ) );
        $this->addReference( 'landmarx', $landmarx );
        $manager->persist( $landmarx );
        
        ////////////////////////////////////////////////////////////////////////
        // php-api
        ////////////////////////////////////////////////////////////////////////
        $phpapi         =   new Project();
        $phpapi->setName( 'php-api' )
               ->setDescription( 'A api walker wrapper for REST style api\'s' )
               ->setUrl( 'http://daviddurost.net/portfolio/php-api')
               ->setCategory( $this->getReference( 'category-wd-s2' ) )
               ->setStatus( $this->getReference( 'status-completed' ) );
        $this->addReference( 'php-api', $phpapi );
        $manager->persist( $phpapi );        
        
        $manager->flush();
    }
    
    public function getOrder()
    {
        return 4;
    }
}