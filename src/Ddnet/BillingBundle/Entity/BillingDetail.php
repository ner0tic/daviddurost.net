<?php

namespace Ddnet\BillingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 * @ORM\Table(name="billing_detail")
 * @ORM\Entity(repositoryClass="Ddnet\BillingBundle\Entity\Repository\BillingDetailRepository")
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
   * @ORM\ManyToOne(targetEntity="Project", inversedBy="billingDetails")
   * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
   */
  protected $project_id;

  /**
   *
   * @var enum $types
   * 
   * @ORM\Column(type="string", columnDefinition="ENUM('hourly', 'flat rate', 'free of charge')") 
   */
  protected $types;

  /**
   * @var enum $terms
   * 
   * @ORM\Column(name="terms", type="string", columnDefinition="ENUM('120', '220', '320', '420', '520', '620')")
   */
  protected $terms = '120';

  /**
   * @var interger $billing_rate
   * 
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
