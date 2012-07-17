<?php

namespace Ddnet\FoursquareBundle\Entity;

class User {

  protected $id;

  protected $firstName;
  
  protected $photo = array(
      'prefix'    =>  '',
      'suffix'    =>  ''
      );
  
  protected $type;
}

?>