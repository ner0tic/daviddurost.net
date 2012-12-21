<?php

namespace Ddnet\PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Ddnet\PortfolioBundle\Entity\Project;
use \Github\Client as Github;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Exception\NotValidCurrentPageException;

class ProjectController extends Controller
{
    public function indexAction()
    {
      $repo = $this->getDoctrine()->getRepository('DdnetPortfolioBundle:Project');
      $query = $repo->createQueryBuilder('p')->orderBy('p.updated, p.name', 'ASC');
      
      switch($this->get('request')->get('_route')) 
      {
        case 'portfolio-by-category':
          $query->leftJoin('DdnetPortfolioBundle:ProjectCategory c')
                ->where('c.slug = :slug')
                ->setParameter('slug', $slug);
          break;
        case 'portfolio-by-tag':
          /** @todo add this delimiting by tags funcitonality **/
        default:
          break;
      }
      
      $pager = new Pagerfanta(new DoctrineORMAdapter($query));
      $pager->setMaxPerPage($this->getRequest()->get('pageMax', 8));
      $pager->setCurrentPage($this->getRequest()->get('page', 1));
      
      $results = $pager->getCurrentPageResults();
      
      return $this->render('DdnetPortfolioBundle:Project:index.html.twig', array('results' => $results, 'pager' => $pager));
    }
    
    public function showAction($slug)
    {
      $em = $this->getDoctrine()->getEntityManager();
      $q = "SELECT p FROM DdnetPortfolioBundle:Project p WHERE p.slug = :slug";
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
    
      return $this->render('DdnetPortfolioBundle:Project:show.html.twig', array('portfolio' => $result, 'commits' => $commits));
    }
    
    public function newAction(Request $request)
    {
      $project = new Project();
      $form = $this->createFormBuilder($project)
              ->add('name')
              ->add('category')
              ->add('status')
              ->add('description')
              ->add('dev_url')
              ->add('prod_url')
              ->add('client')
              ->add('version')
              ->getForm();
      
      if($request->getMethod() == 'POST')
      {
        $form->bindRequest($this->getRequest());
        if($form->isValid())
        {
          $this->getDoctrine()->getEntityManager()->persist($project)->flush(); 
        
          return $this->redirect($this->generateUrl('portfolio'));
        }
      }
      
      return $this->render('DdnetPortfolioBundle:Project:new.html.twig', array ('form' => $form->createView()));
    }
}
