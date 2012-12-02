<?php

namespace Ddnet\UtilityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ddnet\UtilityBundle\Form\Type\ContactType;
use Ddnet\FoursquareBundle\Foursquare\Foursquare;
use Ddnet\FoursquareBundle\Entity\Checkin as Checkin;
use Ddnet\FoursquareBundle\Entity\Venue as fsVenue;

class ContactController extends Controller
{
  public function indexAction()
  {
    $page = '';
    $form = $this->createForm(new ContactType());//, $contact);
    $foursquare = new Foursquare($this->container);
      
    if($request->getMethod() == 'POST')
    {
      $form->bindRequest($this->getRequest());
      if($form->isValid())
      {
        return $this->redirect($this->generateUrl('portfolio'));
      }
    }
      
    // get last checkin
    $checkins = json_decode($foursquare->get('users/'.$this->container->getParameter('foursquare.user_id').'/checkins'), true);
    $checkins = $checkins['response']['checkins']['items'];
    $checkin = new Checkin();
    $checkin->fromArray($checkins[0]);
    
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