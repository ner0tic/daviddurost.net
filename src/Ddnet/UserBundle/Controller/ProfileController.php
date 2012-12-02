<?php

namespace Ddnet\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Config\FileLocator;

class ProfileController extends Controller {
  public function indexAction() {
    // read in a yml file containing the images and captions
    $config = new FileLocator(__DIR__.'/../Resources/config');
    $images= Yaml::parse($config->locate('avatars.yml'));
    // generate a random number between 0 and [array_size]
    $random = mt_Rand(0,count($images)-1);
    // set random
    $avatar = $images[$random];
    
    return $this->render('DdnetUserBundle:Profile:index.html.twig', array('avatar' => $avatar));
  }
}