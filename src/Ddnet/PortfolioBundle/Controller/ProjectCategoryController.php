<?php

namespace Ddnet\PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Ddnet\PortfolioBundle\Entity\ProjectCategory;
use \Github\Client as Github;

class ProjectCategoryController extends Controller
{
    public function indexAction()
    {
      $repo = $this->getDoctrine()->getRepository('DdnetPortfolioBundle:ProjectCategory');
      $query = $repo->createQueryBuilder('c')->orderBy('c.name', 'ASC');
      
      $pager = new Pagerfanta(new DoctrineORMAdapter($query));
      $pager->setMaxPerPage($this->getRequest()->get('pageMax', 8));
      $pager->setCurrentPage($this->getRequest()->get('page', 1));
      
      $results = $pager->getCurrentPageResults();
      
      return $this->render('DdnetPortfolioBundle:ProjectCategory:index.html.twig', array('results' => $results, 'pager' => $pager));
    }
    
    public function showAction($slug)
    {
      $em = $this->getDoctrine()->getEntityManager();
      $q = "SELECT c FROM DdnetPortfolioBundle:ProjectCategory c WHERE c.slug = :slug";
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
    
      return $this->render('DdnetPortfolioBundle:ProjectCategory:show.html.twig', array('portfolio' => $result, 'commits' => $commits));
    }
    
    public function newAction(Request $request)
    {
      $project = new ProjectCategory();
      $form = $this->createFormBuilder($project)
              ->add('name')
              ->add('description')
              ->add('parent')
              ->getForm();
      
      if($request->getMethod() == 'POST')
      {
        $form->bindRequest($this->getRequest());
        if($form->isValid())
        {
          $this->getDoctrine()->getEntityManager()->persist($project)->flush(); 
        
          return $this->redirect($this->generateUrl('categories'));
        }
      }
      
      return $this->render('DdnetPortfolioBundle:ProjectCategory:new.html.twig', array ('form' => $form->createView()));
    }
}
