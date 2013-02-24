<?php

namespace Ddnet\UtilityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller,
    Ddnet\UtilityBundle\Form\Type\ContactType,
    Foursquare\Api\FoursquareApi as Foursquare,
    Symfony\Component\Yaml\Parser;      

class ContactController extends Controller
{
    public function indexAction()
    {
        $page = '';
        $form = $this->createForm( new ContactType() );//, $contact );

        $yaml = new Parser();
        $configs[ '4s' ] = $yaml->parse( file_get_contents( __DIR__ . '/../../../../app/config/foursquare.yml' ) );
        
        $foursquare = new Foursquare();
        $foursquare->setAuthClientId( $configs[ '4s' ][ 'client_id' ] );
        $foursquare->authenticate( $configs[ '4s' ][ 'client_id' ], $configs[ '4s' ][ 'client_secret' ] );
        
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
        var_dump( $foursquare->api( 'venues')->search( array( 
            'near'      =>  'Portland, ME'
        ) ) );
        
        // get last checkin
        $checkin = $foursquare->api( 'users' )
                              ->getRecentCheckin( $configs[ '4s' ][ 'user_id' ] );

                      
                      die ('---');
        
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