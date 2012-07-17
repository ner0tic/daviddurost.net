<?php

namespace Ddnet\FoursquareBundle\Entity;
use Ddnet\FoursquareBundle\Entity\User;
use Ddnet\FoursquareBundle\Entity\Venue;

class Checkin {

  /**
   *
   * @var string $id 
   */
  protected $id;

  /**
   * @var integer $createdAt 
   */
  protected $createdAt;
  
  /**
   *
   * @var string $type
   */
  protected $type = 'checkin';
  
  /**
   *
   * @var string $visibility
   */
  protected $visibility = 'public';
  
  /**
   *
   * @var string $shout
   */
  protected $shout;
  
  /**
   *
   * @var integer $timezoneOffset
   */
  protected $timezoneOffset;
  
  /**
   *
   * @var Ddnet\FoursquareBundle\Entity\User $user
   */
  protected $user;
  
  /**
   *
   * @var Ddnet\FoursquareBundle\Entity\Venue $venue
   */
  protected $venue;
  
  /**
   *
   * @var array $source
   */
  protected $source = array(
      'name'    =>  '',
      'url'     =>  ''
      );
  
  /**
   *
   * @var array $photos
   */
  protected $photos = array();
  
  /**
   *
   * @var array $likes
   */
  protected $likes = array(
      'count'   =>  0,
      'groups'  =>  array()
      );
  
  /**
   *
   * @var boolean $like
   */
  protected $like = false;
  
  /**
   *
   * @var array $score
   */
  protected $score = array(
      'scores'    => array(
          'points'    =>  0,
          'icon'      =>  '',
          'message'   =>  ''
          ),
      'total'     =>  0
      );
}

?>