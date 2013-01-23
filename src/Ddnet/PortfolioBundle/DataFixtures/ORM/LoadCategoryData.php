<?php
namespace Ddnet\PortfolioBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture,
    Doctrine\Common\DataFixtures\OrderedFixtureInterface,
    Doctrine\Common\Persistence\ObjectManager,

    Ddnet\PortfolioBundle\Entity\ProjectCategory;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load( ObjectManager $manager )
    {
        ////////////////////////////////////////////////////////////////////////
        // Web Development
        ////////////////////////////////////////////////////////////////////////
        $webdev             =   new ProjectCategory();
        $webdev->setName( 'web development')
               ->setDescription( 'Web related design and development proejcts.');
        $this->addReference( 'category-webdev', $webdev );
        $manager->persist( $webdev );
        
        ////////////////////////////////////////////////////////////////////////
        // Web Development :: Design
        ////////////////////////////////////////////////////////////////////////
        $webdev_design      =   new ProjectCategory();
        $webdev_design->setName( 'website design.')
                      ->setDescription( 'Website design related projects.' )
                      ->setParent( $this->getReference( 'category-webdev' ) );
        $this->addReference( 'category-wd-design', $webdev_design );
        $manager->persist( $webdev_design );
        
        ////////////////////////////////////////////////////////////////////////
        // Web Development :: Symfony 1.4
        ////////////////////////////////////////////////////////////////////////
        $webdev_symfony1    =   new ProjectCategory();
        $webdev_symfony1->setName( 'symfony 1.4' )
                        ->setDescription( 'Symfony 1.4 related projects.' )
                        ->setParent( $this->getReference( 'category-webdev' ) );
        $this->addReference( 'category-wd-s1', $webdev_symfony1 );
        $manager->persist( $webdev_symfony1 );
        
        ////////////////////////////////////////////////////////////////////////
        // Web Development :: Symfony 2.1
        ////////////////////////////////////////////////////////////////////////
        $webdev_symfony2    =   new ProjectCategory();
        $webdev_symfony2->setName( 'symfony 2.1' )
                        ->setDescription( 'Symfony 2.1 related projects.' )
                        ->setParent( $this->getReference( 'category-webdev' ) );
        $this->addReference( 'category-wd-s2', $webdev_symfony2 );
        $manager->persist( $webdev_symfony2 );
        
        ////////////////////////////////////////////////////////////////////////
        // Web Development :: Ruby
        ////////////////////////////////////////////////////////////////////////
        $webdev_ruby        =   new ProjectCategory();
        $webdev_ruby->setName( 'ruby' )
                    ->setDescription( 'Ruby On Rails related development.' )
                    ->setParent( $this->getReference( 'category-webdev' ) );
        $this->addReference( 'category-wd-rb', $webdev_ruby );
        $manager->persist( $webdev_ruby );
        
        ////////////////////////////////////////////////////////////////////////
        // Web Development :: Node.js
        ////////////////////////////////////////////////////////////////////////
        $webdev_nodejs      =   new ProjectCategory();
        $webdev_nodejs->setName( 'node.js' )
                      ->setDescription( 'Node.js related projects.' )
                      ->setParent( $this->getReference( 'category-webdev' ) );
        $this->addReference( 'category-wd-node', $webdev_nodejs );
        $manager->persist( $webdev_nodejs );
        
        ////////////////////////////////////////////////////////////////////////
        // Web Development :: Code Igniter
        ////////////////////////////////////////////////////////////////////////
        $webdev_codeigniter =   new ProjectCategory();
        $webdev_codeigniter->setName( 'code igniter' )
                           ->setDescription( 'Code Igniter related projects.' )
                           ->setParent( $this->getReference( 'category-webdev' ) );
        $this->addReference( 'category-wd-ci', $webdev_codeigniter );
        $manager->persist( $webdev_codeigniter );
        
        ////////////////////////////////////////////////////////////////////////
        // Web Development :: PHPcake
        ////////////////////////////////////////////////////////////////////////
        $webdev_phpcake     =   new ProjectCategory();
        $webdev_phpcake->setName( 'phpcake' )
                       ->setDescription( 'PHPcake related projects.' )
                       ->setParent( $this->getReference( 'category-webdev' ) );
        $this->addReference( 'category-wd-cake', $webdev_phpcake );
        $manager->persist( $webdev_phpcake );
        
        ////////////////////////////////////////////////////////////////////////
        // Web Development :: Wordpress
        ////////////////////////////////////////////////////////////////////////
        $webdev_wordpress   =   new ProjectCategory();
        $webdev_wordpress->setName( 'wordpress' )
                         ->setDescription( 'Wordpress related projects.' )
                         ->setParent( $this->getReference( 'category-webdev' ) );
        $this->addReference( 'category-wd-wp', $webdev_wordpress );
        $manager->persist( $webdev_wordpress );
        
        ////////////////////////////////////////////////////////////////////////
        // Web Development :: Misc
        ////////////////////////////////////////////////////////////////////////
        $webdev_misc        =   new ProjectCategory();
        $webdev_misc->setName( 'Misc' )
                    ->setDescription( 'Misc web dev projects.' )
                    ->setParent( $this->getReference( 'category-webdev' ) );
        $this->addReference( 'category-wd-misc', $webdev_misc );
        $manager->persist( $webdev_misc );
        
        ////////////////////////////////////////////////////////////////////////
        // Graphic Design
        ////////////////////////////////////////////////////////////////////////
        $gfx                =   new ProjectCategory();
        $gfx->setName( 'graphic design' )
            ->setDescription( 'Graphic design related projects.' );
        $this->addReference( 'category-gfx', $gfx );
        $manager->persist( $gfx );
        
        ////////////////////////////////////////////////////////////////////////
        // Graphic Design :: Print Media
        ////////////////////////////////////////////////////////////////////////
        $gfx_print          =   new ProjectCategory();
        $gfx_print->setName( 'print media' )
                  ->setDescription( 'Print media related projects.' )
                  ->setParent( $this->getReference( 'category-gfx' ) );
        $this->addReference( 'category-gfx-print', $gfx_print );
        $manager->persist( $gfx_print );
        
        ////////////////////////////////////////////////////////////////////////
        // Graphic Design :: Digital Media
        ////////////////////////////////////////////////////////////////////////
        $gfx_digital        =   new ProjectCategory();
        $gfx_digital->setName( 'digital media' )
                    ->setDescription( 'Digital media related projects.' )
                    ->setParent( $this->getReference( 'category-gfx' ) );
        $this->addReference( 'category-gfx-digi', $gfx_digital );
        $manager->persist( $gfx_digital );
        
        ////////////////////////////////////////////////////////////////////////
        // Graphic Design :: Merchandise
        ////////////////////////////////////////////////////////////////////////
        $gfx_merch          =   new ProjectCategory();
        $gfx_merch->setName( 'Merch' )
                    ->setDescription( 'Musician merchandise related ')
                    ->setParent( $this->getReference( 'category-gfx' ) );    
        $this->addReference( 'category-gfx-merch', $gfx_merch );
        $manager->persist( $gfx_merch );
        
        $manager->flush();
    }
    
    public function getOrder()
    {
        return 3;
    }
}