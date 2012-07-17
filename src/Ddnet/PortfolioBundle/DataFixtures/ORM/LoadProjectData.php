<?php
  // src/Ddnet/PortfolioBundle/DataFixtures/ORM/LoadProjectData.php
namespace Ddnet\PortfolioBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Ddnet\PortfolioBundle\Entity\Project;

class LoadProjectData extends AbstractFixture implements OrderedFixtureInterface {
  public function load(ObjectManager $manager) {
    $scssProject = new Project();
    $scssProject->setName("Summer Camp Scheduling System");
    $scssProject->setDescription("A fully function web scheduling application for summer camps.  Users register groups, sites, camps; enroll attendees, generate reports, manage achievements.\\r\\n\\r\\nThis application runs on the symfony 1.4 framework and is backed by mysql and doctrine ORM to maximize data abstraction in a smooth manner.  HTML5/CSS3 technologies were also utilized to boost the user experience.");
    $scssProject->setDevUrl('http://scss.daviddurost/dashboard');
    $scssProject->setSlug('summer-camp-scheduling-system');
    $scssProject->setCategory($manager->merge($this->getReference('web-app')));
    $scssProject->setStatus($manager->merge($this->getReference('status-on-going')));
    $manager->persist($scssProject);
    $this->addReference('scss', $scssProject);
    
    $rsProject = new Project();
    $rsProject->setName("Ride Social");
    $rsProject->setDescription("A socially integrated ride sharing web application.  This web app allows users to add/edit events as well as find rides/passengers to make the trips more economically efficient.");
    $rsProject->setDevUrl("http://ridesocial.ner0tic.dontexist.net/app_dev.php/");
    $rsProject->setSlug('ridesocial');
    $rsProject->setCategory($manager->merge($this->getReference('web-app')));
    $rsProject->setStatus($manager->merge($this->getReference('status-planning')));
    $manager->persist($rsProject);
    $this->addReference('ridesocial', $rsProject);
    
    $neSprayProject = new Project();
    $neSprayProject->setName("Intumescent Coating Flyer");
    $neSprayProject->setDescription("Mailer/ Sales flyer for a Foam Insulation Contractor in Scarborough, Maine.");
    $neSprayProject->setProdUrl("/images/portfolio/ne-spray-lr.pdf");
    $neSprayProject->setSlug("intumescent-coating-flyer");
    $neSprayProject->setCategory($manager->merge($this->getReference('sales-flyer')));
    $neSprayProject->setStatus($manager->merge($this->getReference('status-completed')));
    $manager->persist($neSprayProject);
    $this->addReference('sw-intumescent', $neSprayProject);
    
    $swLeadProject = new Project();
    $swLeadProject->setName("Lead Abatement Tool Sales Flyer");
    $swLeadProject->setDescription("A sales flyer for Sherwin-Williams targeting contractors working on older homes.  As well as meeting new EPA guidelines.");
    $swLeadProject->setProdUrl("/images/portfolio/rrpc.pdf");
    $swLeadProject->setSlug("lead-abatement-tool-sales-flyer");
    $swLeadProject->setCategory($manager->merge($this->getReference('sales-flyer')));
    $swLeadProject->setStatus($manager->merge($this->getReference('status-completed')));
    $manager->persist($swLeadProject);
    $this->addReference('sw-lead', $swLeadProject);
    
    $swContSignUpProject = new Project();
    $swContSignUpProject->setName("Informational Signup Form");
    $swContSignUpProject->setDescription("A contact infomation collection form created for Sherwin-Williams Company.");
    $swContSignUpProject->setProdUrl("/images/portfolio/cont-signup.pdf");
    $swContSignUpProject->setSlug("informational-signup-form");
    $swContSignUpProject->setCategory($manager->merge($this->getReference('sales-flyer')));
    $swContSignUpProject->setStatus($manager->merge($this->getReference('status-completed')));
    $manager->persist($swContSignUpProject);
    $this->addReference('sw-cont-signup', $swContSignUpProject);
    
    $navMenuProject = new Project();
    $navMenuProject->setName("ddNavMenuPlugin");
    $navMenuProject->setDescription("A menu framework plugin for symfony to generate a navigation menu from either a yaml file or an array.  Complete with custom renderers.");
    $navMenuProject->setProdUrl("http://daviddurost.net/portfolio/ddNavMenuPlugin");
    $navMenuProject->setCategory($manager->merge($this->getReference('sf-plugin')));
    $navMenuProject->setStatus($manager->merge($this->getReference('status-completed')));
    $navMenuProject->setSlug("ddNavMenuPlugin");
    $manager->persist($navMenuProject);
    $this->addReference('sf-nav-pl', $navMenuProject);
    
    $toggleSwitchProject = new Project();
    $toggleSwitchProject->setName("ddDoctrineInputToggleSwitchPlugin");
    $toggleSwitchProject->setDescription("plugin to generate a toggle switch styled widget for use with the symfony form framework");
    $toggleSwitchProject->setProdUrl("http://daviddurost.net/portfolio/ddDoctrineInputToggleSwitchPlugin");
    $toggleSwitchProject->setSlug("ddDoctrineInputToggleSwitchPlugin");
    $toggleSwitchProject->setStatus($manager->merge($this->getReference('status-completed')));
    $toggleSwitchProject->setCategory($manager->merge($this->getReference('sf-plugin')));
    $manager->persist($toggleSwitchProject);
    $this->addReference('sf-tgl-pl', $toggleSwitchProject);
    
    $fsqProject = new Project();
    $fsqProject->setName("ddFoursquarePlugin");
    $fsqProject->setDescription("Foursquare api wrapper plugin for symfony with slight modification to allow for easier static class generation");
    $fsqProject->setProdUrl("http://daviddurost.net/portoflio/ddfoursquareplugin");
    $fsqProject->setSlug("ddFoursquarePlugin");
    $fsqProject->setCategory($manager->merge($this->getReference('sf-plugin')));
    $fsqProject->setStatus($manager->merge($this->getReference('status-completed')));
    $manager->persist($fsqProject);
    $this->addReference('sf-4sq-pl', $fsqProject);
    
    $githubProject = new Project();
    $githubProject->setName("ddGithubPlugin");
    $githubProject->setDescription("github api class wrapper plugin for symfony");
    $githubProject->setProdUrl("https://github.com/ner0tic/ddGithubPlugin");
    $githubProject->setSlug("ddGithubPlugin");
    $githubProject->setCategory($manager->merge($this->getReference('sf-plugin')));
    $githubProject->setStatus($manager->merge($this->getReference('status-completed')));
    $manager->persist($githubProject);
    $this->addReference('sf-github-pl', $githubProject);
    
    $manager->flush();
  }
  
  public function getOrder() { return 3; }  
}

