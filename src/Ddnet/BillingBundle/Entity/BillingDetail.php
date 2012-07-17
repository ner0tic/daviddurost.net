<?php

namespace Ddnet\BillingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 * @ORM\Table(name="billing_detail")
 */
class BillingDetail {

  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @var Ddnet\PortfolioBundle\Entity\Project
   *
   * @ORM\ManyToOne(targetEntity="Proejct", inversedBy="billingDetails")
   * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
   */
  protected $project_id;

  protected $types = array('hourly', 'flat rate');


  protected $cycle_type;

  /**
   * @ORM\Column(name="terms", type="integer")
   */
  protected $terms = 120;

  /**
   * @ORM\Column(name="billing_rate", type="integer")
   */
  protected $billing_rate;

  /**
   * @var datetime $created
   *
   * @Gedmo\Timestampable(on="create")
   * @ORM\Column(type="datetime")
   */
  private $created;

  /**
   * @var datetime $updated
   *
   * @Gedmo\Timestampable(on="update")
   * @ORM\Column(type="datetime")
   */
  private $updated;
}

?>
