<?php

namespace Ddnet\UtilityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Ddnet\UtilityBundle\Form\Type\ContactType;
use Ddnet\FoursquareBundle\Foursquare\Foursquare;

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
      $mapUrl = $foursquare->getMapUrl(400,300); // todo: move these to global vars
      return $this->render('DdnetUtilityBundle:Default:contact.html.twig',array('page' => $page, 'form' => $form->createView(), 'foursquare' => $fq, 'mapUrl' => $mapUrl));
    }
}
