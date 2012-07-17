<?php

namespace Ddnet\BillingBundle\Controller;

use Ddnet\BillingBundle\Form\Type\ClientType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Ddnet\BillingBundle\Entity\Client;

class ClientController extends Controller {
    public function indexAction($name) {
        return null;
    }
    
    public function newAction(Request $request) {
      $client = new Client();
      $form = $this->createFormBuilder($client)
              ->add('first_name','text')
              ->add('company_name')
              ->add('first_name')
              ->add('last_name')
              ->add('street')
              ->add('suburb')
              ->add('city')
              ->add('zone')
              ->add('country')
              ->add('postal_code')
              ->add('phone')
              ->add('fax')
              ->add('email_address')
              ->add('url')
              ->add('twitter')
              ->getForm();
      
      if($request->getMethod() == 'POST') {
        $form->bindRequest($this->getRequest());
        if($form->isValid()) {
          $em = $this->getDoctrine()->getEntityManager();
          $em->persist($client);
          $em->flush();
          
          return $this->redirect($this->generateUrl('client'));
        }
      }
      
      return $this->render('DdnetBillingBundle:Client:new.html.twig', array('form'=>$form->createView()));
    }
}
