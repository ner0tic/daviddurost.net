<?php

namespace Ddnet\UtilityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Ddnet\FoursquareBundle\Entity\User,
        
    Ddnet\UtilityBundle\Form\Type\ContactType;      

class ContactController extends Controller
{
    public function indexAction()
    {
        $page = '';
        $form = $this->createForm( new ContactType() );//, $contact );

        //$foursquare = new Foursquare();
        $foursquare = $this->get( 'foursquare' );
        
        $user = new User();
        $user->fromArray(
                json_decode( $foursquare->get( 'users/421286' )
        ) );
        
        if( $this->getRequest()->getMethod() == 'POST' )
        {
            $form->bindRequest( $this->getRequest() );
            if( $form->isValid() )
            {
                return $this->redirect( 
                        $this->generateUrl( 'portfolio' ) 
                );
            }
        }

        // get last checkin
        $checkin = $user->getCheckins();
        $checkin = $checkin[0];

        // get venue
        $venue = $checkin->getVenue();

        // get map
        $map = $this->get( 'ivory_google_map.map' );
        $map->setCenter( 
                $venue->getLocation()
                      ->getLat(), 
                $venue->getLocation()
                      ->getLng(), 
                true
        );
        $map->setMapOption( 
                'zoom', 
                12 
        );

        // mark it
        $marker = $this->get( 'ivory_google_map.marker' );
        $marker->setPosition( 
                $venue->getLocation()
                      ->getLat(), 
                $venue->getLocation()
                      ->getLng(), 
                true
        );
        $map->addMarker( $marker );

        return $this->render( 
                'DdnetUtilityBundle:Contact:index.html.twig', 
                array(
                    'page'      => $page, 
                    'form'      => $form->createView(), 
                    'checkin'   => $checkin, 
                    'venue'     => $venue, 
                    'map'       => $map
        ) );
    }
}