<?php

namespace Ddnet\UtilityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Ddnet\UtilityBundle\Form\Type\ContactType;
use Ddnet\FoursquareBundle\Foursquare\Foursquare;
use Ddnet\FoursquareBundle\Entity\Checkin as Checkin;
use Ddnet\FoursquareBundle\Entity\Venue as fsVenue;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction()
    {
        return '';
    }
    
    public function contactAction(Request $request) {
      $page = '';
      //$contact = new Contact();
      $form = $this->createForm(new ContactType());//, $contact);
      $foursquare = new Foursquare($this->container);
      
      
       if($request->getMethod() == 'POST') {
        $form->bindRequest($this->getRequest());
        if($form->isValid()) {
          
          
          return $this->redirect($this->generateUrl('portfolio'));
        }
      }
      
      // get last checkin
      $checkins = json_decode($foursquare->get('users/'.$this->container->getParameter('foursquare.user_id').'/checkins'), true);
      $checkins = $checkins['response']['checkins']['items'];
      $checkin = new Checkin();
      $checkin->fromArray($checkins[0]);
      //var_dump($checkins);die('...');
      // get venue
      $venue = $checkin->getVenue();
      
      $map = $this->get('ivory_google_map.map');
      $map->setCenter($venue->getLocation()->getLat(), $venue->getLocation()->getLng(), true);
      $map->setMapOption('zoom', 12);
      
      $marker = $this->get('ivory_google_map.marker');
      $marker->setPosition($venue->getLocation()->getLat(), $venue->getLocation()->getLng(), true);
      
      $map->addMarker($marker);
      return $this->render('DdnetUtilityBundle:Default:contact.html.twig',array('page' => $page, 'form' => $form->createView(), 'checkin' => $checkin, 'venue' => $venue, 'map' => $map));
    }
}
