<?php
namespace Ddnet\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture,
    Doctrine\Common\DataFixtures\OrderedFixtureInterface,
    Doctrine\Common\Persistence\ObjectManager,
        
    Symfony\Component\DependencyInjection\ContainerAwareInterface,
    Symfony\Component\DependencyInjection\ContainerInterface,

    Ddnet\UserBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;
    
    /**
     * {@inheritDoc}
     */
    public function setContainer( ContainerInterface $container = null )
    {
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public function load( ObjectManager $manager )
    {
        ////////////////////////////////////////////////////////////////////////
        // ner0tic
        ////////////////////////////////////////////////////////////////////////
        $ner0tic        =   new User();
        $ner0tic->setUsername( 'ner0tic' )
                ->setEmail( 'david.durost@gmail.com' )
                ->setFirstName( 'david' )
                ->setLastName( 'durost' )
                ->setUrl( 'http://daviddurost.net' )
                ->setSuperAdmin( true )
                ->setEnabled( true );                
        $encoder = $this->container
                        ->get( 'security.encoder_factory' )
                        ->getEncoder( $ner0tic );
        $ner0tic->setPassword( $encoder->encodePassword( 'dummyp4ssw0rd', $ner0tic->getSalt() ) );
        $this->addReference( 'ner0tic', $ner0tic );
        $manager->persist( $ner0tic );
        $manager->flush();       
    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1;
    }
}