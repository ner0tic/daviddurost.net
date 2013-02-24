<?php

namespace Ddnet\PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Ddnet\PortfolioBundle\Entity\Project;
use Ddnet\PortfolioBundle\Form\Type\ProjectType;
use \Github\Client as Github;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Exception\NotValidCurrentPageException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ProjectController extends Controller
{
    public function indexAction()
    {
        $repo = $this->getDoctrine()->getRepository( 'DdnetPortfolioBundle:Project' );
        $query = $repo->createQueryBuilder( 'p' )->orderBy( 'p.updated, p.name', 'ASC' );

        switch( $this->get( 'request' )->get( '_route' ) ) 
        {
            case 'portfolio-by-category':
                $query->leftJoin( 'DdnetPortfolioBundle:ProjectCategory c ')
                      ->where( 'c.slug = :slug' )
                      ->setParameter( 'slug', $slug );
                break;
            case 'portfolio-by-tag':
            /** @todo add this delimiting by tags funcitonality **/
            default:
                break;
        }
      
        $pager = new Pagerfanta( new DoctrineORMAdapter( $query ) );
        $pager->setMaxPerPage( $this->getRequest()->get( 'pageMax', 8 ) );
        $pager->setCurrentPage( $this->getRequest()->get( 'page', 1 ) );
        
        $repo = $this->getDoctrine()
                         ->getRepository( 'DdnetPortfolioBundle:ProjectStatus' );
        $query = $repo->createQueryBuilder( 's' )
                      ->orderBy( 's.name', 'ASC' )
                      ->getQuery();
        $statuses = $query->getResult();
        
        $repo = $this->getDoctrine()
                     ->getRepository( 'DdnetPortfolioBundle:ProjectCategory' );
        $query = $repo->createQueryBuilder( 'c' )
                      ->orderBy( 'c.name', 'ASC' )
                      ->getQuery();
        $categories = $query->getResult();
        
      
        return $this->render( 'DdnetPortfolioBundle:Project:index.html.twig', array(
            'projects'      =>  $pager->getCurrentPageResults(), 
            'pager'         =>  $pager,
            'statuses'      =>  $statuses,
            'categories'    =>  $categories
        ) );
    }
    
    public function showAction( $slug )
    {
        $em = $this->getDoctrine()->getEntityManager();
        $q = "SELECT p FROM DdnetPortfolioBundle:Project p WHERE p.slug = :slug";
        $query = $em->createQuery( $q )->setParameter( 'slug', $slug );
        $result = $query->getSingleResult();

        $gh = new Github();
        $commits = $gh->api( 'repo' )
                ->commits()
                ->all( $result->getGithubUser(), $result->getGithubRepo(), array(
                    'sha' => $result->getGithubBranch()
        ) );

        return $this->render( 'DdnetPortfolioBundle:Project:show.html.twig', array(
            'portfolio' =>  $result, 
            'commits'   =>  $commits
        ) );
    }
    
    public function modalAction( $slug )
    {
        $em = $this->getDoctrine()->getEntityManager();
        $q = "SELECT p FROM DdnetPortfolioBundle:Project p WHERE p.slug = :slug";
        $query = $em->createQuery( $q )->setParameter( 'slug', $slug );
        $result = $query->getSingleResult();

        return $this->render( 'DdnetPortfolioBundle:Project:modal.html.twig', array(
            'portfolio' =>  $result
        ) );
    }    
    
    public function newAction( Request $request )
    {
        $project = new Project();

        $form = $this->createForm( new ProjectType(), $project );

        if( $this->getRequest()->getMethod() == 'POST' )
        {
            $form->bindRequest ($this->getRequest() );
            if( $form->isValid( ))
            {
              $em = $this->getDoctrine()->getEntityManager();
              $em->persist( $project );
              
              $thumbnail_dir = __DIR__ . '../Resources/public/images/user-files/thumbnails/';
              $thumbnail = $form->get('thumbnail')->getData()->move( $thumbnail_dir, $thumbnail );
              
              $photo_dir = __DIR__ . '../Resources/public/images/user-files/projects/';
              $photo = $form->get('photo')->getData()->move( $photo_dir, $photo );
              
              $em->flush(); 

              return $this->redirect( $this->generateUrl( 'portfolio' ) );
            }
        }

        return $this->render( 'DdnetPortfolioBundle:Project:new.html.twig', array(
            'form'  =>  $form->createView()
        ) );
    }
    
    public function uploadAction() 
    {
        
    }
    
    public function editAction( $slug )
    {
        $em = $this->getDoctrine()->getEntityManager();
        $q = "SELECT p FROM DdnetPortfolioBundle:Project p WHERE p.slug = :slug";
        $query = $em->createQuery( $q )->setParameter( 'slug', $slug );
        $result = $query->getSingleResult();

        return $this->render( 'DdnetPortfolioBundle:Project:new.html.twig', array(
            'portfolio' =>  $result, 
            'commits'   =>  $commits
        ) );
    }
}
