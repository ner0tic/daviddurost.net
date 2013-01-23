<?php

namespace Ddnet\PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Ddnet\PortfolioBundle\Entity\ProjectCategory;
use Ddnet\PortfolioBundle\Form\Type\ProjectCategoryType;
use \Github\Client as Github;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Exception\NotValidCurrentPageException;

class ProjectCategoryController extends Controller
{
    public function indexAction()
    {
        $repo = $this->getDoctrine()->getRepository( 'DdnetPortfolioBundle:ProjectCategory' );
        $query = $repo->createQueryBuilder( 'c' )->orderBy( 'c.name', 'ASC' );

        $pager = new Pagerfanta( new DoctrineORMAdapter( $query ) );
        $pager->setMaxPerPage( $this->getRequest()->get( 'pageMax', 8 ) );
        $pager->setCurrentPage( $this->getRequest()->get( 'page', 1 ) );

        $results = $pager->getCurrentPageResults();

        return $this->render( 'DdnetPortfolioBundle:ProjectCategory:index.html.twig', array( 
            'results'   =>  $results, 
            'pager'     =>  $pager
        ) );
    }
    
    public function showAction( $slug )
    {
        $em = $this->getDoctrine()->getEntityManager();
        $q = "SELECT c FROM DdnetPortfolioBundle:ProjectCategory c WHERE c.slug = :slug";
        $query = $em->createQuery( $q )->setParameter( 'slug', $slug );
        $result = $query->getSingleResult();

        return $this->render( 'DdnetPortfolioBundle:ProjectCategory:show.html.twig', array(
            'category' =>  $result
        ) );
    }
    
    public function newAction( Request $request )
    {
        $category = new ProjectCategory();
        
        $form = $this->createForm( new ProjectCategoryType(), $category );
      
        if( $request->getMethod() == 'POST' )
        {
            $form->bindRequest( $this->getRequest() );
            
            if( $form->isValid() )
            {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist( $category );
                $em->flush(); 
        
                return $this->redirect( $this->generateUrl( 'categories' ) );
            }
        }
      
        return $this->render( 'DdnetPortfolioBundle:ProjectCategory:new.html.twig', array (
            'form'  =>  $form->createView()
        ) );
    }
}
