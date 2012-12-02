<?php

namespace Ddnet\PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Ddnet\PortfolioBundle\Entity\ProjectStatus;
use \Github\Client as Github;

class ProjectStatusController extends Controller
{
    public function indexAction()
    {
      $repo = $this->getDoctrine()->getRepository('DdnetPortfolioBundle:ProjectStatus');
      $query = $repo->createQueryBuilder('s')->orderBy('s.name', 'ASC');
      
      $pager = new Pagerfanta(new DoctrineORMAdapter($query));
      $pager->setMaxPerPage($this->getRequest()->get('pageMax', 10));
      $pager->setCurrentPage($this->getRequest()->get('page', 1));
      
      $results = $pager->getCurrentPageResults();
      
      return $this->render('DdnetPortfolioBundle:ProjectStatus:index.html.twig', array('results' => $results, 'pager' => $pager));
    }
    
    public function showAction($slug)
    {
      $em = $this->getDoctrine()->getEntityManager();
      $q = "SELECT s FROM DdnetPortfolioBundle:ProjectStatus s WHERE s.slug = :slug";
      $query = $em->createQuery($q)->setParameter('slug', $slug);
      $result = $query->getSingleResult();
      
      $gh = new Github();
      $commits = $gh->api('repo')
              ->commits()
              ->all($result->getGithubUser(), 
                    $result->getGithubRepo(),  
                    array(
                      'sha' => $result->getGithubBranch()
                    )
              );
    
      return $this->render('DdnetPortfolioBundle:ProjectStatus:show.html.twig', array('portfolio' => $result, 'commits' => $commits));
    }
    
    public function newAction(Request $request)
    {
      $project = new ProjectStatus();
      $form = $this->createFormBuilder($project)
              ->add('name')
              ->add('description')
              ->getForm();
      
      if($request->getMethod() == 'POST')
      {
        $form->bindRequest($this->getRequest());
        if($form->isValid())
        {
          $this->getDoctrine()->getEntityManager()->persist($project)->flush(); 
        
          return $this->redirect($this->generateUrl('status'));
        }
      }
      
      return $this->render('DdnetPortfolioBundle:ProjectStatus:new.html.twig', array ('form' => $form->createView()));
    }
}
