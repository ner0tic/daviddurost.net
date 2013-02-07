<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),
            
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            
            new JMS\AopBundle\JMSAopBundle(),
            new JMS\DiExtraBundle\JMSDiExtraBundle($this),
            new JMS\SecurityExtraBundle\JMSSecurityExtraBundle(),            
            
            new Ddnet\PortfolioBundle\DdnetPortfolioBundle(),
            new Ddnet\UtilityBundle\DdnetUtilityBundle(),
            new Ddnet\UserBundle\DdnetUserBundle(),
            
            new Ner0tic\FoursquareBundle\Ner0ticFoursquareBundle(),                        
            
            new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),
            
            new FOS\UserBundle\FOSUserBundle(),
            
            new Ivory\GoogleMapBundle\IvoryGoogleMapBundle(),
            new Vich\UploaderBundle\VichUploaderBundle(),
            
            new Braincrafted\BootstrapBundle\BraincraftedBootstrapBundle(),
            
            new Knp\Bundle\GaufretteBundle\KnpGaufretteBundle(),
            new Knp\Bundle\LastTweetsBundle\KnpLastTweetsBundle(),
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            new Millwright\MenuBundle\MillwrightMenuBundle(),
            new Millwright\ConfigurationBundle\MillwrightConfigurationBundle(),
            
            
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Elao\WebProfilerExtraBundle\WebProfilerExtraBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
            $bundles[] = new JMS\DebuggingBundle\JMSDebuggingBundle($this);
        }
        
        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
    
    protected function getContainerBaseClass()
    {
        if (in_array($this->getEnvironment(), array('dev', 'test'))) 
        {
            return '\JMS\DebuggingBundle\DependencyInjection\TraceableContainer';
        }

        return parent::getContainerBaseClass();
    }
}
