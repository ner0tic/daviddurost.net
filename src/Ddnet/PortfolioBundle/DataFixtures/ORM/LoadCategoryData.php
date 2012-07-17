<?php
  // src/Ddnet/PortfolioBundle/DataFixtures/ORM/LoadCategoryData.php
namespace Ddnet\PortfolioBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Ddnet\PortfolioBundle\Entity\Category;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface {
  public function load(ObjectManager $manager) {
    $programming = new Category();
    $programming->setName('programming');
    $manager->persist($programming);
    $this->addReference('programming', $programming);
    
    $proBash = new Category();
    $proBash->setName('bash scripting');
    $proBash->setParent($programming);
    $manager->persist($proBash);    
    $this->addReference('bash-script', $proBash);
    
    $webDev = new Category();
    $webDev->setName('web development');
    //$webDev->setParent($programming);
    $manager->persist($webDev);
    $this->addReference('web-dev', $webDev);
    
    $wdLogo = new Category();
    $wdLogo->setName('logo');
    $wdLogo->setParent($webDev);
    $manager->persist($wdLogo);
    $this->addReference('logo', $wdLogo);
    
    $wdForm = new Category();
    $wdForm->setName('form');
    $wdForm->setParent($webDev);
    $manager->persist($wdForm);
    $this->addReference('form', $wdForm);
    
    $wdApp = new Category();
    $wdApp->setName('web application');
    $wdApp->setParent($webDev);
    $manager->persist($wdApp);
    $this->addReference('web-app', $wdApp);
    
    $wdSite = new Category();
    $wdSite->setName('website');
    $wdSite->setParent($webDev);
    $manager->persist($wdSite);
    $this->addReference('website', $wdSite);
    
    $wdPlugin = new Category();
    $wdPlugin->setName('symfony plugin');
    $wdPlugin->setParent($webDev);
    $manager->persist($wdPlugin);
    $this->addReference('sf-plugin', $wdPlugin);
    
    $wdBundle = new Category();
    $wdBundle->setName('symfony bundle');
    $wdBundle->setParent($webDev);
    $manager->persist($wdBundle);
    $this->addReference('sf-bundle', $wdBundle);
    
    $media = new Category();
    $media->setName('media');
    $manager->persist($media);
    $this->addReference('media', $media);
    
    $medPrint = new Category();
    $medPrint->setName('print media');
    $medPrint->setParent($media);
    $manager->persist($medPrint);
    $this->addReference('print-media', $medPrint);
    
    $medDigi = new Category();
    $medDigi->setName('digital media');
    $medDigi->setParent($media);
    $manager->persist($medDigi);
    $this->addReference('digital-media', $medDigi);
    
    $flyer = new Category();
    $flyer->setName('flyer');
    $flyer->setParent($media);
    $manager->persist($flyer);
    $this->addReference('flyer', $flyer);
    
    $conflyer = new Category();
    $conflyer->setName('concert flyer');
    $conflyer->setParent($flyer);
    $manager->persist($conflyer);
    $this->addReference('concert-flyer', $conflyer);
    
    $saleflyer = new Category();
    $saleflyer->setName('sales flyer');
    $saleflyer->setParent($flyer);
    $manager->persist($saleflyer);
    $this->addReference('sales-flyer', $saleflyer);
    
    $manager->flush();
  }
  
  public function getOrder() { return 1; }  
}