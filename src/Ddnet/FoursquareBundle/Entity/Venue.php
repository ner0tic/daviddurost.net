<?php

namespace Ddnet\FoursquareBundle\Entity;

class Venue {

  protected $id;

  protected $name;
  
  protected $contact = array (
      'phone'           =>  '',
      'formattedPhone'  =>  ''
      );
  
  protected $location;
  
  protected $categories = array();
  
  protected $verified = false;
  
  protected $stats = array(
      'checkinsCount'   =>  0,
      'usersCount'      => 0,
      'tipCount'        =>  0
      );
  
  protected $url;
  
  protected $likes = array(
      'count'   =>  0,
      'groups'  =>  ''
      );
  
  
  protected $specials = array(
      'count'   => 0
      );
  
  protected $events = array();
  
}

?>