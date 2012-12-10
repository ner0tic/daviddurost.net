<?php

namespace Ddnet\UtilityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ddnet\UtilityBundle\Form\Type\ContactType;
use Foursquare\Client as Foursquare;

class ContactController extends Controller
{
  public function indexAction()
  {
    $page = '';
    $form = $this->createForm(new ContactType());//, $contact);
    
    $foursquare = new Foursquare();
    $foursquare->setAuthClientId('421286');
      
    if($request->getMethod() == 'POST')
    {
      $form->bindRequest($this->getRequest());
      if($form->isValid())
      {
        return $this->redirect($this->generateUrl('portfolio'));
      }
    }
      
    // get last checkin
    $checkin = $foursquare->api('users')->getRecentCheckin();
    
    var_dump($checkin);
    die('...');
    
    // get venue
    $venue = $checkin->getVenue();
      
    // get map
    $map = $this->get('ivory_google_map.map');
    $map->setCenter($venue->getLocation()->getLat(), $venue->getLocation()->getLng(), true);
    $map->setMapOption('zoom', 12);
      
    // mark it
    $marker = $this->get('ivory_google_map.marker');
    $marker->setPosition($venue->getLocation()->getLat(), $venue->getLocation()->getLng(), true);
    $map->addMarker($marker);
    
    return $this->render('DdnetUtilityBundle:Contact:index.html.twig',array('page' => $page, 'form' => $form->createView(), 'checkin' => $checkin, 'venue' => $venue, 'map' => $map));
  }
}