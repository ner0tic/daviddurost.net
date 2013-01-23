<?php
namespace Ddnet\PortfolioBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture,
    Doctrine\Common\DataFixtures\OrderedFixtureInterface,
    Doctrine\Common\Persistence\ObjectManager,

    Ddnet\PortfolioBundle\Entity\ProjectStatus;

class LoadStatusData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load( ObjectManager $manager )
    {
        ////////////////////////////////////////////////////////////////////////
        // Abandoned Status
        ////////////////////////////////////////////////////////////////////////
        $abandoned  =   new ProjectStatus();
        $abandoned->setName( 'abandoned' )
                  ->setDescription( 'Projects that have been dropped indefinitely.' );
        $manager->persist( $abandoned );
        $this->addReference( 'status-abandoned', $abandoned );
        
        ////////////////////////////////////////////////////////////////////////
        // Active Status
        ////////////////////////////////////////////////////////////////////////       
        $active     =   new ProjectStatus();
        $active->setName( 'active' )
               ->setDescription( 'Projects currently under development.' );
        $manager->persist( $active );
        $this->addReference( 'status-active', $active );
        
        ////////////////////////////////////////////////////////////////////////
        // Complete Status
        ////////////////////////////////////////////////////////////////////////
        $complete   =   new ProjectStatus();
        $complete->setName( 'complete' )
                 ->setDescription( 'Completed projects.' );
        $manager->persist( $complete );
        $this->addReference( 'status-complete', $complete );
        
        ////////////////////////////////////////////////////////////////////////
        // On Going Status
        ////////////////////////////////////////////////////////////////////////
        $ongoing    =   new ProjectStatus();
        $ongoing->setName( 'on going' )
                ->setDescription( 'Projects with a continuing development.' );
        $manager->persist( $ongoing );
        $this->addReference( 'status-ongoing', $ongoing );                
        
        ////////////////////////////////////////////////////////////////////////
        // On Hold Status
        ////////////////////////////////////////////////////////////////////////
        $onhold     =   new ProjectStatus();
        $onhold->setName( 'on hold')
               ->setDescription( 'Projects with development temporarily placed on hold.' );
        $manager->persist( $onhold );
        $this->addReference( 'status-onhold', $onhold );
        
        ////////////////////////////////////////////////////////////////////////
        // Planning Status
        ////////////////////////////////////////////////////////////////////////
        $planning   =   new ProjectStatus();
        $planning->setName( 'planning' )
                 ->setDescription( 'Projects still in the planning stages.' );
        $manager->persist( $planning );
        $this->addReference( 'status-planning', $planning );
        
        $manager->flush();
    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2;
    }
}