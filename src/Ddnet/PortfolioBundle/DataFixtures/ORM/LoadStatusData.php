<?php
  // src/Ddnet/PortfolioBundle/DataFixtures/ORM/LoadStatusData.php
namespace Ddnet\PortfolioBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Ddnet\PortfolioBundle\Entity\Status;

class LoadStatusData extends AbstractFixture implements OrderedFixtureInterface {
  public function load(ObjectManager $manager) {
    $abandoned = new Status();
    $abandoned->setName('abandoned');
    $abandoned->setSlug('abandoned');
    $manager->persist($abandoned);
    $this->addReference('status-abandoned', $abandoned);
    
    $planning = new Status();
    $planning->setName('planning');
    $planning->setSlug('planning');
    $manager->persist($planning);
    $this->addReference('status-planning', $planning);
    
    $active = new Status();
    $active->setName('active');
    $active->setSlug('active');
    $manager->persist($active);
    $this->addReference('status-active', $active);
    
    $completed = new Status();
    $completed->setName('completed');
    $completed->setSlug('completed');
    $manager->persist($completed);
    $this->addReference('status-completed', $completed);
    
    $hold = new Status();
    $hold->setName('on hold');
    $hold->setSlug('on-hold');
    $manager->persist($hold);
    $this->addReference('status-on-hold', $hold);
    
    $going = new Status();
    $going->setName('on going');
    $going->setSlug('on-going');
    $manager->persist($going);
    $this->addReference('status-on-going', $going);
    
    $manager->flush();
  }
  
  public function getOrder() { return 2; }  
}