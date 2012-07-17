<?php

namespace Ddnet\FoursquareBundle\Entity;

class Category {

  protected $id;

  protected $name;
  
  protected $pluralName;
  
  protected $shortName;
  
  protected $icon = array(
      'prefix'    =>  '',
      'suffix'    =>  ''
      );
  
  protected $primary = false;
}

?>