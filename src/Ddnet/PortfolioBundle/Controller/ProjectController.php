<?php

namespace Ddnet\PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Ddnet\PortfolioBundle\Entity\Project;
use Ddnet\PortfolioBundle\Entity\Status;
use Ddnet\PortfolioBundle\Entity\Category;

class ProjectController extends Controller
{
    /**
     * @Route("/portfolio")
     * @Template()
     */
    public function indexAction($status=null)
    {
      if(!is_null($status)) {
        $status = $this->getDoctrine()
                           ->getEntityManager()
                           ->createQuery("SELECT s FROM DdnetPortfolioBundle:Status s WHERE s.slug = :status")
                           ->setParameter('status', $status)
                           ->getSingleResult();
        $portfolios = $this->getDoctrine()
                           ->getEntityManager()
                           ->createQuery('SELECT p FROM DdnetPortfolioBundle:Project p WHERE p.status = :status')
                           ->setParameter('status', $status)
                           ->getResult();
      } else
        $portfolios = $this->getDoctrine()
                           ->getEntityManager()
                           ->createQuery('SELECT p FROM DdnetPortfolioBundle:Project p ORDER BY p.name ASC')
                           ->getResult();
      $statuses = $this->getDoctrine()
                       ->getEntityManager()
                       ->createQuery('SELECT s FROM DdnetPortfolioBundle:Status s ORDER BY s.name ASC')
                       ->getResult();
      return $this->render('DdnetPortfolioBundle:Project:index.html.twig', array('portfolios'=>$portfolios, 'status' => $status, 'statuses' => $statuses, 'filter' => null));
    }

    public function showAction($slug) {
      $em = $this->getDoctrine()->getEntityManager();
      $q = "SELECT p FROM DdnetPortfolioBundle:Project p WHERE p.slug = :slug";
      $q = $em->createQuery($q)->setParameter('slug',$slug);
      $r = $q->getSingleResult();
      return $this->render('DdnetPortfolioBundle:Project:show.html.twig', array('portfolio' => $r));
    }

    public function popupAction($id) {
      $em = $this->getDoctrine()->getEntityManager();
      $q = "SELECT p FROM DdnetPortfolioBundle:Project p WHERE p.id = :id";
      $q = $em->createQuery($q)->setParameter('id',$id);
      $r = $q->getSingleResult();
      return $this->render('DdnetPortfolioBundle:Project:popup.html.twig', array('portfolio' => $r, 'no_layout' => true));
    }

    public function newAction(Request $request) {
      $project = new Project();
      $form = $this->createFormBuilder($project)
              ->add('name')
              ->add('category')
              ->add('status')
              ->add('skills')
              /*->add('created')
              ->add('updated')
              ->add('slug')*/
              ->add('description')
              ->add('dev_url')
              ->add('prod_url')
              ->add('client')
              ->add('version')
              ->getForm();

      if($request->getMethod() == 'POST') {
        $form->bindRequest($this->getRequest());
        if($form->isValid()) {
          $em = $this->getDoctrine()->getEntityManager();
          $em->persist($project);
          $em->flush();

          return $this->redirect($this->generateUrl('portfolio'));
        }
      }
      return $this->render('DdnetPortfolioBundle:Project:new.html.twig', array('form' => $form->createView()));
    }
}
