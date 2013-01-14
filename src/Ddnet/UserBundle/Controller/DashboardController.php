<?php

namespace Ddnet\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Exception\NotValidCurrentPageException;
use Instagram\Client as Instagram;
use Symfony\Component\Yaml\Parser;


class DashboardController extends Controller 
{
    public function indexAction() 
    {
        // Recent Projects
        $repo = $this->getDoctrine()->getRepository( 'DdnetPortfolioBundle:Project' );
        $query = $repo->createQueryBuilder( 'p' )->orderBy( 'p.updated, p.name', 'ASC' );

        $project_pager = new Pagerfanta( new DoctrineORMAdapter( $query ) );
        $project_pager->setMaxPerPage( $this->getRequest()->get( 'p_pgMax', 4 ) );
        $project_pager->setCurrentPage( $this->getRequest()->get( 'p_pg', 1 ) );
      
        $projects = $project_pager->getCurrentPageResults();
      
        // Recent Activities
        /**
         * @todo this will pull from variable sources
         * (twitter, tumblr, facebook, g+, etc)
         * and generate a newsfeed styled display
         * Required methods:
         * slug - return some sort of slug to identify the item (source-date-subj)
         * date - return the post date
         * source - return the source (twitter, facebook, etc)
         * message - return the post (tweet, etc)
         * url - return url to the post's source feed
         */
        $activities = array(
            0 => array(
                'name' => 'test activity 1',
                'source' => 'twitter',
                'date'    =>  '2013-01-03 06:00:00',
                'message' =>  'blah blah blah blah blah blah blah blah blah blah',
                'slug'    =>  'twitter-test-activity-1',
                'url'     =>  'http://www.test.com'
            ),
            1 => array(
                'name' => 'test activity 2',
                'source' => 'twitter',
                'date'    =>  '2013-01-02 18:31:00',
                'message' =>  'blah blah blah blah blah blah blah blah blah blah',
                'slug'    =>  'twitter-test-activity-2',
                'url'     =>  'http://www.test.com'
            ),
            2 => array(
                'name' => 'test activity 3',
                'source' => 'twitter',
                'date'    =>  '2013-01-01 00:00:12',
                'message' =>  'blah blah blah blah blah blah blah blah blah blah',
                'slug'    =>  'twitter-test-activity-3',
                'url'     =>  'http://www.test.com'
            )
        );
        /**
         * @todo fix all of this! curl errors...
         */
        // Recent Photo
        $photo = null;
        /**
         * @todo file a cleaner way to load the configs (upstream issue)
         */
//        $yaml = new Parser();
//        $configs['ig'] = $yaml->parse( file_get_contents( __DIR__ . '/../../../../app/config/instagram.yml' ) );
        
//        $ig = new Instagram();
//        $ig->setAuthClientId( $configs[ 'ig' ][ 'client_id' ] );
//        
//        var_dump($ig->api('users')->getRecentMedia(null, array(
//            'limit'   =>  1
//        ) ));
//        die('...');
//        
        return $this->render( 'DdnetUserBundle:Dashboard:index.html.twig', array(
            'projects'      =>  $results,
            'proj_pager'    =>  $project_pager,
            'activities'    =>  $activities,
            'act_pager'     =>  $activity_pager,
            'photo'         =>  $photo
        ) );                  
    }
}